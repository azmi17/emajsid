<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\FaqController;
use App\Http\Controllers\Front\LoginController;
use App\Http\Controllers\Front\PostController;
use App\Http\Controllers\Front\SubCategoryController;
use App\Http\Controllers\Front\TagController;
use App\Http\Controllers\Front\LanguageController;
use App\Http\Controllers\Front\SejarahController;
use App\Http\Controllers\Front\PengurusController;
use App\Http\Controllers\Front\KhutbahController;
use App\Http\Controllers\Front\InformasiController;
use App\Http\Controllers\Front\KalkulatorController;

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminSubCategoryController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminAuthorController;
use App\Http\Controllers\Admin\AdminLanguageController;
use App\Http\Controllers\Admin\AdminProfilMasjidController;
use App\Http\Controllers\Admin\AdminJadwalController;
use App\Http\Controllers\Admin\AdminInformasiController;

use App\Http\Controllers\Author\AuthorHomeController;
use App\Http\Controllers\Author\AuthorProfileController;
use App\Http\Controllers\Author\AuthorPostController;

/* Front End */
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/language/switch', [LanguageController::class, 'switch_language'])->name('front_language');
Route::get('/subcategory-by-category/{id}', [HomeController::class, 'get_subcategory_by_category'])->name('subcategory-by-category');
Route::post('/search/result', [HomeController::class, 'search'])->name('search_result');
Route::get('/faq', [FaqController::class, 'index'])->name('faq');
Route::get('/news-detail/{id}', [PostController::class, 'detail'])->name('news_detail');
Route::get('/category/{id}', [SubCategoryController::class, 'index'])->name('category');
Route::get('/sejarahmasjid', [SejarahController::class, 'index'])->name('sejarahmasjid');
Route::get('/pengurusmasjid', [PengurusController::class, 'index'])->name('pengurusmasjid');
Route::get('/jadwalkhutbah', [KhutbahController::class, 'index'])->name('jadwalkhutbah');
Route::get('/kasmasjid', [InformasiController::class, 'index'])->name('kasmasjid');
Route::get('/kalkulator/zakatPenghasilan', [KalkulatorController::class, 'zakatPenghasilan'])->name('zakat_penghasilan');
Route::get('/kalkulator/zakatMal', [KalkulatorController::class, 'zakatMal'])->name('zakat_mal');
Route::get('/kalkulator/zakatFitrah', [KalkulatorController::class, 'zakatFitrah'])->name('zakat_fitrah');
Route::get('/jadwalshalat', [SubCategoryController::class, 'jadwalshalat'])->name('jadwalshalat');

Route::get('/tag/{tag_name}', [TagController::class, 'show'])->name('tag_posts_show');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login-submit', [LoginController::class, 'login_submit'])->name('login_submit');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/forget-password', [LoginController::class, 'forget_password'])->name('forget_password');
Route::post('/forget-password-submit', [LoginController::class, 'forget_password_submit'])->name('forget_password_submit');
Route::get('/reset-password/{token}/{email}', [LoginController::class, 'reset_password'])->name('reset_password');
Route::post('/reset-password-submit', [LoginController::class, 'reset_password_submit'])->name('reset_password_submit');

/* Author */
Route::get('/author/home', [AuthorHomeController::class, 'index'])->name('author_home')->middleware('author:author');
Route::get('/author/edit-profile', [AuthorProfileController::class, 'index'])->name('author_profile')->middleware('author:author');
Route::post('/author/edit-profile-submit', [AuthorProfileController::class, 'profile_submit'])->name('author_profile_submit');
Route::get('/author/post/show', [AuthorPostController::class, 'show'])->name('author_post_show')->middleware('author:author');
Route::get('/author/post/create', [AuthorPostController::class, 'create'])->name('author_post_create')->middleware('author:author');
Route::post('/author/post/store', [AuthorPostController::class, 'store'])->name('author_post_store');
Route::get('/author/post/edit/{id}', [AuthorPostController::class, 'edit'])->name('author_post_edit')->middleware('author:author');
Route::post('/author/post/update/{id}', [AuthorPostController::class, 'update'])->name('author_post_update');
Route::get('/author/post/delete/{id}', [AuthorPostController::class, 'delete'])->name('author_post_delete')->middleware('author:author');
Route::get('/author/post/tag/delete/{id}/{id1}', [AuthorPostController::class, 'delete_tag'])->name('author_post_delete_tag')->middleware('author:author');

/* Admin */
Route::get('/admin/home', [AdminHomeController::class, 'index'])->name('admin_home')->middleware('admin:admin');
Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('admin_login');
Route::post('/admin/login-submit', [AdminLoginController::class, 'login_submit'])->name('admin_login_submit');
Route::get('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin_logout');
Route::get('/admin/forget-password', [AdminLoginController::class, 'forget_password'])->name('admin_forget_password');
Route::post('/admin/forget-password-submit', [AdminLoginController::class, 'forget_password_submit'])->name('admin_forget_password_submit');
Route::get('/admin/reset-password/{token}/{email}', [AdminLoginController::class, 'reset_password'])->name('admin_reset_password');
Route::post('/admin/reset-password-submit', [AdminLoginController::class, 'reset_password_submit'])->name('admin_reset_password_submit');

Route::get('/admin/edit-profile', [AdminProfileController::class, 'index'])->name('admin_profile')->middleware('admin:admin');
Route::post('/admin/edit-profile-submit', [AdminProfileController::class, 'profile_submit'])->name('admin_profile_submit');

Route::get('/admin/sub-category/show', [AdminSubCategoryController::class, 'show'])->name('admin_sub_category_show')->middleware('admin:admin');
Route::get('/admin/sub-category/create', [AdminSubCategoryController::class, 'create'])->name('admin_sub_category_create')->middleware('admin:admin');

Route::post('/admin/sub-category/store', [AdminSubCategoryController::class, 'store'])->name('admin_sub_category_store');

Route::get('/admin/sub-category/edit/{id}', [AdminSubCategoryController::class, 'edit'])->name('admin_sub_category_edit')->middleware('admin:admin');
Route::post('/admin/sub-category/update/{id}', [AdminSubCategoryController::class, 'update'])->name('admin_sub_category_update');
Route::get('/admin/sub-category/delete/{id}', [AdminSubCategoryController::class, 'delete'])->name('admin_sub_category_delete')->middleware('admin:admin');

Route::get('/admin/post/show', [AdminPostController::class, 'show'])->name('admin_post_show')->middleware('admin:admin');
Route::get('/admin/post/create', [AdminPostController::class, 'create'])->name('admin_post_create')->middleware('admin:admin');
Route::post('/admin/post/store', [AdminPostController::class, 'store'])->name('admin_post_store');
Route::get('/admin/post/edit/{id}', [AdminPostController::class, 'edit'])->name('admin_post_edit')->middleware('admin:admin');
Route::post('/admin/post/update/{id}', [AdminPostController::class, 'update'])->name('admin_post_update');
Route::get('/admin/post/delete/{id}', [AdminPostController::class, 'delete'])->name('admin_post_delete')->middleware('admin:admin');
Route::get('/admin/post/tag/delete/{id}/{id1}', [AdminPostController::class, 'delete_tag'])->name('admin_post_delete_tag')->middleware('admin:admin');

Route::get('/admin/setting', [AdminSettingController::class, 'index'])->name('admin_setting')->middleware('admin:admin');
Route::post('/admin/setting/update', [AdminSettingController::class, 'update'])->name('admin_setting_update');

Route::get('/admin/setting/login', [AdminSettingController::class, 'login'])->name('admin_setting_login')->middleware('admin:admin');
Route::post('/admin/setting/login/update', [AdminSettingController::class, 'login_update'])->name('admin_setting_login_update');

Route::get('/admin/faq/show', [AdminFaqController::class, 'show'])->name('admin_faq_show')->middleware('admin:admin');
Route::get('/admin/faq/create', [AdminFaqController::class, 'create'])->name('admin_faq_create')->middleware('admin:admin');
Route::post('/admin/faq/store', [AdminFaqController::class, 'store'])->name('admin_faq_store');
Route::get('/admin/faq/edit/{id}', [AdminFaqController::class, 'edit'])->name('admin_faq_edit')->middleware('admin:admin');
Route::post('/admin/faq/update/{id}', [AdminFaqController::class, 'update'])->name('admin_faq_update');
Route::get('/admin/faq/delete/{id}', [AdminFaqController::class, 'delete'])->name('admin_faq_delete')->middleware('admin:admin');

Route::get('/admin/author/show', [AdminAuthorController::class, 'show'])->name('admin_author_show')->middleware('admin:admin');
Route::get('/admin/author/create', [AdminAuthorController::class, 'create'])->name('admin_author_create')->middleware('admin:admin');
Route::post('/admin/author/store', [AdminAuthorController::class, 'store'])->name('admin_author_store');
Route::get('/admin/author/edit/{id}', [AdminAuthorController::class, 'edit'])->name('admin_author_edit')->middleware('admin:admin');
Route::post('/admin/author/update/{id}', [AdminAuthorController::class, 'update'])->name('admin_author_update');
Route::get('/admin/author/delete/{id}', [AdminAuthorController::class, 'delete'])->name('admin_author_delete')->middleware('admin:admin');

Route::get('/admin/language/show', [AdminLanguageController::class, 'show'])->name('admin_language_show')->middleware('admin:admin');
Route::get('/admin/language/create', [AdminLanguageController::class, 'create'])->name('admin_language_create')->middleware('admin:admin');
Route::post('/admin/language/store', [AdminLanguageController::class, 'store'])->name('admin_language_store');
Route::get('/admin/language/edit/{id}', [AdminLanguageController::class, 'edit'])->name('admin_language_edit')->middleware('admin:admin');
Route::post('/admin/language/update/{id}', [AdminLanguageController::class, 'update'])->name('admin_language_update');
Route::get('/admin/language/delete/{id}', [AdminLanguageController::class, 'delete'])->name('admin_language_delete')->middleware('admin:admin');

Route::get('/admin/language/update-detail/{id}', [AdminLanguageController::class, 'update_detail'])->name('admin_language_update_detail')->middleware('admin:admin');
Route::post('/admin/language/update-detail-submit/{id}', [AdminLanguageController::class, 'update_detail_submit'])->name('admin_language_update_detail_submit');

Route::get('/admin/profilmasjid/sejarah', [AdminProfilMasjidController::class, 'sejarah'])->name('admin_profil_masjid_sejarah')->middleware('admin:admin');
Route::post('/admin/profilmasjid/sejarah/update', [AdminProfilMasjidController::class, 'sejarah_update'])->name('admin_profil_masjid_sejarah_update');

Route::get('/admin/profilmasjid/pengurus', [AdminProfilMasjidController::class, 'pengurus'])->name('admin_profil_masjid_pengurus_show')->middleware('admin:admin');
Route::post('/admin/profilmasjid/pengurus/update', [AdminProfilMasjidController::class, 'pengurus_update'])->name('admin_profil_masjid_pengurus_update');

Route::post('/admin/jadwal/jadwalkhutbah/store', [AdminJadwalController::class, 'store'])->name('admin_jadwal_khutbah_store');
Route::get('/admin/jadwal/jadwalkhutbah/create', [AdminJadwalController::class, 'create'])->name('admin_jadwal_khutbah_create')->middleware('admin:admin');
Route::get('/admin/jadwal/jadwalkhutbah/show', [AdminJadwalController::class, 'show'])->name('admin_jadwal_khutbah_show')->middleware('admin:admin');
Route::get('/admin/jadwal/jadwalkhutbah/edit/{id}', [AdminJadwalController::class, 'edit'])->name('admin_jadwal_khutbah_edit')->middleware('admin:admin');
Route::put('/admin/jadwal/jadwalkhutbah/update/{id}', [AdminJadwalController::class, 'update'])->name('admin_jadwal_khutbah_update')->middleware('admin:admin');
Route::get('/admin/jadwal/jadwalkhutbah/delete/{id}', [AdminJadwalController::class, 'delete'])->name('admin_jadwal_khutbah_delete')->middleware('admin:admin');

Route::post('/admin/informasi/kas/store', [AdminInformasiController::class, 'store'])->name('admin_kas_store');
Route::get('/admin/informasi/kas/create', [AdminInformasiController::class, 'create'])->name('admin_kas_create')->middleware('admin:admin');
Route::get('/admin/informasi/kas/show', [AdminInformasiController::class, 'show'])->name('admin_kas_show')->middleware('admin:admin');
Route::get('/admin/informasi/kas/edit/{id}', [AdminInformasiController::class, 'edit'])->name('admin_kas_edit')->middleware('admin:admin');
Route::put('/admin/informasi/kas/update/{id}', [AdminInformasiController::class, 'update'])->name('admin_kas_update')->middleware('admin:admin');
Route::get('/admin/informasi/kas/delete/{id}', [AdminInformasiController::class, 'delete'])->name('admin_kas_delete')->middleware('admin:admin');
