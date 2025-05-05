    <?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\ProductController;
    use App\Http\Controllers\AuthController;

    // Public routes (login & register)
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Protected routes (requires login)
    Route::middleware(['auth'])->group(function () {
        Route::get('/', function () {
            return view('welcome'); // or redirect to dashboard if preferred
        });

        Route::get('/dashboard', function () {
            return view('dashboard');
        });

        Route::resource('products', ProductController::class);
    });
