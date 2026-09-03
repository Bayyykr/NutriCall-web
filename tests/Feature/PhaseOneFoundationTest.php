<?php

declare(strict_types=1);

use App\Models\Barcode;
use App\Models\ConsumptionLog;
use App\Models\EatingHabit;
use App\Models\Food;
use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\ScanHistory;
use App\Models\User;
use App\Models\UserProfile;
use App\Support\Enums\ActivityLevel;
use App\Support\Enums\MealType;
use App\Support\Enums\ScanType;
use App\Support\Traits\ApiResponseTrait;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('database has seeded foods, recipes, and ingredients', function () {
    $this->seed();

    expect(Food::count())->toBeGreaterThanOrEqual(8);
    expect(Ingredient::count())->toBeGreaterThan(0);
    expect(Recipe::count())->toBeGreaterThan(0);
    expect(Barcode::count())->toBeGreaterThan(0);

    $grilledChicken = Food::where('name', 'Dada Ayam Panggang Herbal')->first();
    expect($grilledChicken)->not->toBeNull();
    expect($grilledChicken->recipe)->not->toBeNull();
    expect($grilledChicken->recipe->instructions)->toBeArray();
    expect($grilledChicken->ingredients)->not->toBeEmpty();
    expect($grilledChicken->barcodes)->not->toBeEmpty();
    expect($grilledChicken->calories)->toBe(284.0);
});

test('user can have profile, eating habits, and hobbies', function () {
    $user = User::create([
        'name' => 'John Doe',
        'username' => 'johndoe',
        'email' => 'john@example.com',
        'password' => 'secret123',
    ]);

    $profile = $user->profile()->create([
        'age' => 25,
        'activity_level' => ActivityLevel::MEDIUM,
    ]);

    $eatingHabit = $user->eatingHabit()->create([
        'breakfast' => 'Oatmeal with fruits',
        'lunch' => 'Brown rice with chicken',
        'dinner' => 'Fresh vegetable salad',
        'snack' => 'Fresh juice',
    ]);

    $hobby = $user->hobbies()->create([
        'hobby' => 'Jogging & Cooking',
    ]);

    expect($user->profile)->toBeInstanceOf(UserProfile::class);
    expect($user->profile->activity_level)->toBe(ActivityLevel::MEDIUM);
    expect($user->eatingHabit)->toBeInstanceOf(EatingHabit::class);
    expect($user->hobbies)->toHaveCount(1);
    expect($profile->user->id)->toBe($user->id);
    expect($eatingHabit->user->id)->toBe($user->id);
    expect($hobby->user->id)->toBe($user->id);
});

test('user can issue sanctum tokens', function () {
    $user = User::create([
        'name' => 'Jane Doe',
        'email' => 'jane@example.com',
        'password' => 'password123',
    ]);

    $token = $user->createToken('test-token')->plainTextToken;

    expect($token)->toBeString()->not->toBeEmpty();
    expect($user->tokens)->toHaveCount(1);
});

test('consumption log tracks meal type, quantity, and user/food relations', function () {
    $user = User::create([
        'name' => 'Meal Logger',
        'email' => 'logger@example.com',
        'password' => 'password123',
    ]);

    $food = Food::create([
        'name' => 'Salmon Panggang',
        'category' => 'dinner',
        'calories' => 367.0,
        'protein' => 34.0,
        'carbohydrate' => 0.0,
        'fat' => 22.0,
    ]);

    $log = ConsumptionLog::create([
        'user_id' => $user->id,
        'food_id' => $food->id,
        'meal_type' => MealType::DINNER,
        'quantity' => 1,
        'consumed_at' => now(),
    ]);

    expect($log->meal_type)->toBe(MealType::DINNER);
    expect($log->user->id)->toBe($user->id);
    expect($log->food->id)->toBe($food->id);
    expect(ConsumptionLog::today()->count())->toBe(1);
    expect(ConsumptionLog::forUser($user->id)->count())->toBe(1);
});

test('scan history records scan type, results, and timestamp', function () {
    $user = User::create([
        'name' => 'Scanner User',
        'email' => 'scanner@example.com',
        'password' => 'password123',
    ]);

    $history = ScanHistory::create([
        'user_id' => $user->id,
        'scan_type' => ScanType::FOOD,
        'image_path' => 'scans/test.jpg',
        'result' => ['detected' => 'Apple', 'confidence' => 0.95],
        'scanned_at' => now(),
    ]);

    expect($history->scan_type)->toBe(ScanType::FOOD);
    expect($history->result)->toBeArray();
    expect($history->result['detected'])->toBe('Apple');
    expect($history->user->id)->toBe($user->id);
});

test('food scopes search and filter category correctly', function () {
    Food::create([
        'name' => 'Nasi Goreng Spesial',
        'category' => 'dinner',
        'calories' => 450.0,
        'protein' => 12.0,
        'carbohydrate' => 60.0,
        'fat' => 15.0,
    ]);

    Food::create([
        'name' => 'Salad Buah Segar',
        'category' => 'snack',
        'calories' => 120.0,
        'protein' => 2.0,
        'carbohydrate' => 25.0,
        'fat' => 1.0,
    ]);

    expect(Food::search('Goreng')->count())->toBe(1);
    expect(Food::search('Salad')->count())->toBe(1);
    expect(Food::byCategory('dinner')->count())->toBe(1);
    expect(Food::byCategory('snack')->count())->toBe(1);
});

test('api response trait generates standardized format', function () {
    $class = new class
    {
        use ApiResponseTrait;

        public function testSuccess()
        {
            return $this->successResponse(['id' => 1], 'Data fetched');
        }

        public function testError()
        {
            return $this->errorResponse('Validation failed', 422, ['field' => 'Required']);
        }
    };

    $successResponse = $class->testSuccess();
    expect($successResponse->status())->toBe(200);
    $data = $successResponse->getData(true);
    expect($data['success'])->toBeTrue();
    expect($data['message'])->toBe('Data fetched');
    expect($data['data']['id'])->toBe(1);

    $errorResponse = $class->testError();
    expect($errorResponse->status())->toBe(422);
    $errData = $errorResponse->getData(true);
    expect($errData['success'])->toBeFalse();
    expect($errData['message'])->toBe('Validation failed');
    expect($errData['errors']['field'])->toBe('Required');
});
