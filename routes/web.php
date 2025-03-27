use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfilController;

// Halaman Login
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Proyek
    Route::get('/proyek', [ProyekController::class, 'index'])->name('proyek');
    Route::get('/proyekDetail/{id}', [ProyekController::class, 'detail'])->name('proyekDetail');
    Route::get('/addProyek', [ProyekController::class, 'create'])->name('addProyek');

    // Forum
    Route::get('/forum', [ForumController::class, 'index'])->name('forum');

    // Task Management
    Route::get('/addTask', [TaskController::class, 'create'])->name('addTask');
    Route::get('/datugas', [TaskController::class, 'list'])->name('datugas');
    Route::get('/datugas2/{projectId}', [TaskController::class, 'ganttChart'])->name('datugas2');

    // Task Phases
    Route::get('/taskplanning', [TaskController::class, 'taskPlanning'])->name('taskplanning');
    Route::get('/taskanalysis', [TaskController::class, 'taskAnalysis'])->name('taskanalysis');
    Route::get('/taskdesign', [TaskController::class, 'taskDesign'])->name('taskdesign');
    Route::get('/taskimplementation', [TaskController::class, 'taskImplementation'])->name('taskimplementation');
    Route::get('/tasktesting', [TaskController::class, 'taskTesting'])->name('tasktesting');
    Route::get('/taskmaintenance', [TaskController::class, 'taskMaintenance'])->name('taskmaintenance');

    // Penilaian
    Route::get('/penilaian', [PenilaianController::class, 'index'])->name('penilaian');
    Route::get('/penilaian2', [PenilaianController::class, 'detail'])->name('penilaian2');
    Route::get('/penilaian/mahasiswa', [PenilaianController::class, 'mahasiswa'])->name('penilaian.mahasiswa');

    // Rekap dan Laporan
    Route::get('/rekap', [PenilaianController::class, 'rekap'])->name('rekap');
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');

    // Profil
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
});
