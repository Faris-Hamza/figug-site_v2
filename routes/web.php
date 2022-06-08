<?php
use App\Http\Controllers\LocaleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InterventionController;


Route::get('/change-language/{locale}', [LocaleController::class, 'switch'])->name('change.language');

// Home Route
Route::get('/',[App\Http\Controllers\Home::class, 'index'])->name('Accuiel');
Route::get('/about',[App\Http\Controllers\Home::class, 'about'])->name('about');
Route::get('/activites',[App\Http\Controllers\Home::class, 'activites'])->name('activites');
Route::get('/showActivite/{id}',[App\Http\Controllers\Home::class, 'showActivite'])->name('showActivite');
Route::get('/showProjet/{id}',[App\Http\Controllers\Home::class, 'showProjet'])->name('showProjet');
Route::get('/p_rojet',[App\Http\Controllers\Home::class, 'projets'])->name('p_rojet');
Route::get('/soutenezNous',[App\Http\Controllers\Home::class, 'soutenezNous'])->name('soutenezNous');
Route::get('/getInsc',[App\Http\Controllers\Home::class, 'getInsc'])->name('getInsc');

// info Routes
Route::get('/info', [App\Http\Controllers\InfoController::class, 'edit'])->name('info');
Route::post('/info/update/{id}', [App\Http\Controllers\InfoController::class, 'update'])->name('info/update');

// equipes Routes
Route::get('equipes', [App\Http\Controllers\EquipesController::class, 'index'])->name('equipes');
Route::get('equipes/create', [App\Http\Controllers\EquipesController::class, 'create'])->name('equipes/create');
Route::post('equipes/store', [App\Http\Controllers\EquipesController::class, 'store'])->name('equipes/store');
Route::get('equipes/edit/{id}', [App\Http\Controllers\EquipesController::class, 'edit'])->name('equipes/edit');
Route::post('equipes/update/{id}', [App\Http\Controllers\EquipesController::class, 'update'])->name('equipes/update');
Route::get('equipes/destroy/{id}', [App\Http\Controllers\EquipesController::class, 'destroy'])->name('equipes/destroy');

// demande Routes
Route::get('demandes', [App\Http\Controllers\DemandeController::class, 'index'])->name('demandes');
Route::get('demande/create', [App\Http\Controllers\DemandeController::class, 'create'])->name('demande/create');
Route::post('demande/store', [App\Http\Controllers\DemandeController::class, 'store'])->name('demande/store');
Route::get('demande/edit/{id}', [App\Http\Controllers\DemandeController::class, 'edit'])->name('demande/edit');
Route::post('demande/update/{id}', [App\Http\Controllers\DemandeController::class, 'update'])->name('demande/update');
Route::get('demande/destroy/{id}', [App\Http\Controllers\DemandeController::class, 'destroy'])->name('demande/destroy');
Route::get('demande/pdfDemande/{id}/{local}', [App\Http\Controllers\DemandeController::class, 'pdfDemande'])->name('demande/pdfDemande');

// Axe Routes
Route::get('Axe', [App\Http\Controllers\AxesController::class, 'index'])->name('Axe');
Route::get('Axe/create', [App\Http\Controllers\AxesController::class, 'create'])->name('Axe/create');
Route::post('Axe/store', [App\Http\Controllers\AxesController::class, 'store'])->name('Axe/store');
Route::get('Axe/edit/{id}', [App\Http\Controllers\AxesController::class, 'edit'])->name('Axe/edit');
Route::post('Axe/update/{id}', [App\Http\Controllers\AxesController::class, 'update'])->name('Axe/update');
Route::get('Axe/destroy/{id}', [App\Http\Controllers\AxesController::class, 'destroy'])->name('Axe/destroy');

//partenaire_routes
Route::get('partenaires', [App\Http\Controllers\PartenaireController::class, 'index'])->name('partenaires');
Route::get('partenaire/create', [App\Http\Controllers\PartenaireController::class, 'create'])->name('partenaire/create');
Route::post('partenaire/store', [App\Http\Controllers\PartenaireController::class, 'store'])->name('partenaire/store');
Route::get('partenaire/show/{id}', [App\Http\Controllers\PartenaireController::class, 'show'])->name('partenaire/show');
Route::get('partenaire/edit/{id}', [App\Http\Controllers\PartenaireController::class, 'edit'])->name('partenaire/edit');
Route::post('partenaire/update/{id}', [App\Http\Controllers\PartenaireController::class, 'update'])->name('partenaire/update');
Route::get('partenaire/destroy/{id}', [App\Http\Controllers\PartenaireController::class, 'destroy'])->name('partenaire/destroy');

//projet _ routes
Route::get('projets', [App\Http\Controllers\ProjetsController::class, 'index'])->name('projets');
Route::get('projet/create', [App\Http\Controllers\ProjetsController::class, 'create'])->name('projet/create');
Route::post('projet/store', [App\Http\Controllers\ProjetsController::class, 'store'])->name('projet/store');
Route::get('projet/show/{id}', [App\Http\Controllers\ProjetsController::class, 'show'])->name('projet/show');
Route::get('projet/edit/{id}', [App\Http\Controllers\ProjetsController::class, 'edit'])->name('projet/edit');
Route::post('projet/update/{id}', [App\Http\Controllers\ProjetsController::class, 'update'])->name('projet/update');
Route::get('projet/destroy/{id}', [App\Http\Controllers\ProjetsController::class, 'destroy'])->name('projet/destroy');

//revenu _ routes
Route::get('revenus', [App\Http\Controllers\RevenuController::class, 'index'])->name('revenus');
Route::get('revenu/create', [App\Http\Controllers\RevenuController::class, 'create'])->name('revenu/create');
Route::post('revenu/store', [App\Http\Controllers\RevenuController::class, 'store'])->name('revenu/store');
Route::get('revenu/show/{id}', [App\Http\Controllers\RevenuController::class, 'show'])->name('revenu/show');
Route::get('revenu/edit/{id}', [App\Http\Controllers\RevenuController::class, 'edit'])->name('revenu/edit');
Route::post('revenu/update/{id}', [App\Http\Controllers\RevenuController::class, 'update'])->name('revenu/update');
Route::get('revenu/destroy/{id}', [App\Http\Controllers\RevenuController::class, 'destroy'])->name('revenu/destroy');
Route::get('revenu/pdfRevenu/{local}', [App\Http\Controllers\RevenuController::class, 'pdfRevenu'])->name('revenu/pdfRevenu');

//depense _ routes
Route::get('depenses', [App\Http\Controllers\DepenseController::class, 'index'])->name('depenses');
Route::get('depense/create', [App\Http\Controllers\DepenseController::class, 'create'])->name('depense/create');
Route::post('depense/store', [App\Http\Controllers\DepenseController::class, 'store'])->name('depense/store');
Route::get('depense/show/{id}', [App\Http\Controllers\DepenseController::class, 'show'])->name('depense/show');
Route::get('depense/edit/{id}', [App\Http\Controllers\DepenseController::class, 'edit'])->name('depense/edit');
Route::post('depense/update/{id}', [App\Http\Controllers\DepenseController::class, 'update'])->name('depense/update');
Route::get('depense/destroy/{id}', [App\Http\Controllers\DepenseController::class, 'destroy'])->name('depense/destroy');
Route::get('depense/pdfDepense/{locale}', [App\Http\Controllers\DepenseController::class, 'pdfDepense'])->name('depense/pdfDepense');

//activite_routes
 Route::get('activite', [App\Http\Controllers\ActiviteController::class, 'index'])->name('activite');
 Route::get('activite/create', [App\Http\Controllers\ActiviteController::class, 'create'])->name('activite/create');
 Route::post('activite/store', [App\Http\Controllers\ActiviteController::class, 'store'])->name('activite/store');
 Route::get('activite/show/{id}', [App\Http\Controllers\ActiviteController::class, 'show'])->name('activite/show');
 Route::get('activite/edit/{id}', [App\Http\Controllers\ActiviteController::class, 'edit'])->name('activite/edit');
 Route::post('activite/update/{id}', [App\Http\Controllers\ActiviteController::class, 'update'])->name('activite/update');
 Route::get('activite/destroy/{id}', [App\Http\Controllers\ActiviteController::class, 'destroy'])->name('activite/destroy');

  //Presse _routes
  Route::get('presse', [App\Http\Controllers\PresseController::class, 'index'])->name('presse');
  Route::get('presse/create', [App\Http\Controllers\PresseController::class, 'create'])->name('presse/create');
  Route::post('presse/store', [App\Http\Controllers\PresseController::class, 'store'])->name('presse/store');
  Route::get('presse/show/{id}', [App\Http\Controllers\PresseController::class, 'show'])->name('presse/show');
  Route::get('presse/edit/{id}', [App\Http\Controllers\PresseController::class, 'edit'])->name('presse/edit');
  Route::post('presse/update/{id}', [App\Http\Controllers\PresseController::class, 'update'])->name('presse/update');
  Route::get('presse/destroy/{id}', [App\Http\Controllers\PresseController::class, 'destroy'])->name('presse/destroy');

  //Mail _routes
  Route::get('mail', [App\Http\Controllers\MailsController::class, 'index'])->name('mail');
  Route::get('mail/create', [App\Http\Controllers\MailsController::class, 'create'])->name('mail/create');
  Route::post('mail/store', [App\Http\Controllers\MailsController::class, 'store'])->name('mail/store');
  Route::get('mail/show/{id}', [App\Http\Controllers\MailsController::class, 'show'])->name('mail/show');
  Route::get('mail/edit/{id}', [App\Http\Controllers\MailsController::class, 'edit'])->name('mail/edit');
  Route::post('mail/update/{id}', [App\Http\Controllers\MailsController::class, 'update'])->name('mail/update');
  Route::get('mail/destroy/{id}', [App\Http\Controllers\MailsController::class, 'destroy'])->name('mail/destroy');

  //Rapport _routes
  Route::get('rapports', [App\Http\Controllers\RapportActiviteController::class, 'index'])->name('rapports');
  Route::get('rapport/create', [App\Http\Controllers\RapportActiviteController::class, 'create'])->name('rapport/create');
  Route::post('rapport/store', [App\Http\Controllers\RapportActiviteController::class, 'store'])->name('rapport/store');
  Route::get('rapport/show/{id}', [App\Http\Controllers\RapportActiviteController::class, 'show'])->name('rapport/show');
  Route::get('rapport/edit/{id}', [App\Http\Controllers\RapportActiviteController::class, 'edit'])->name('rapport/edit');
  Route::post('rapport/update/{id}', [App\Http\Controllers\RapportActiviteController::class, 'update'])->name('rapport/update');
  Route::get('rapport/destroy/{id}', [App\Http\Controllers\RapportActiviteController::class, 'destroy'])->name('rapport/destroy');
  Route::get('rapport/pdfRapport/{id}/{local}', [App\Http\Controllers\RapportActiviteController::class, 'pdfRapport'])->name('rapport/pdfRapport');

// dashboard _routes
  Route::post('rapport/pdfRapportParDate', [App\Http\Controllers\DashboardController::class, 'pdfRapportParDate'])->name('rapport/pdfRapportParDate');

Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashbord', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashbord');
Route::get('/users', [App\Http\Controllers\HomeController::class, 'users'])->name('users');
Route::get('/users/{id}', [App\Http\Controllers\HomeController::class, 'usersDestroy'])->name('usersDestroy');
