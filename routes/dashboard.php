<?php 
use App\Http\Controllers\Dashboard\AppointmentController;
use App\Http\Controllers\Dashboard\DepartmentController;
use App\Http\Controllers\Dashboard\DoctorController;
use App\Http\Controllers\Dashboard\InvoiceController;
use App\Http\Controllers\Dashboard\MedicationController;
use App\Http\Controllers\Dashboard\PatientController;
use App\Http\Controllers\Dashboard\PrescriptionController;
use App\Http\Controllers\Dashboard\TreatmentController;
use App\Http\Controllers\Dashboard\TreatmentSessionController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Route;



Route::resource('patients', PatientController::class);

// Doctor Routes
Route::resource('doctors', DoctorController::class);

// Appointment Routes
Route::resource('appointments', AppointmentController::class);

// Invoice Routes
Route::resource('invoices', InvoiceController::class);

// Treatment Routes
Route::resource('treatments', TreatmentController::class);

// Treatment Session Routes
Route::resource('treatment-sessions', TreatmentSessionController::class);

// Medication Routes
Route::resource('medications', MedicationController::class);

// Prescription Routes
Route::resource('prescriptions', PrescriptionController::class);

// Department Routes
Route::resource('departments', DepartmentController::class);

//user
Route::resource('users', UserController::class);


