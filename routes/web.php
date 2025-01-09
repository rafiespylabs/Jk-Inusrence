<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\LeadsourceController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\FollowupController;
use App\Http\Controllers\ProoftypeController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\VehiclemodelController;
use App\Http\Controllers\PolicyholderController;
use App\Http\Controllers\DealerController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\RenewController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CreditCardPayController;
use App\Http\Controllers\PreparePolicyController;
use App\Http\Controllers\ReferredPersonController;
use App\Http\Controllers\InsuranceproviderController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\ExpensetypesController;
use App\Http\Controllers\PolicycategoryController;
use App\Http\Controllers\PolicyDocumentController;
use App\Http\Controllers\HealthInsurenceController;
use App\Http\Controllers\FireInsurenceController;
use App\Http\Controllers\EmployerInsurenceController;
use App\Http\Controllers\HealthpoliciesController;
use App\Http\Controllers\OtherpoliciesController;
use App\Http\Controllers\ToolcompanyController;
use App\Http\Controllers\TooltypeController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\LoantypeController;
use App\Http\Controllers\VechiclecategoryController;
use Illuminate\Support\Facades\Route;
// Route::get('/', [ComingsoonController::class, 'index'])->name('comingsoon');
Route::get('/', function () {return redirect(route('login'));});
Route::get('/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/branches', [BranchController::class, 'index'])->name('branches');
    Route::post('/branch/store', [BranchController::class, 'store'])->name('branch.store');
    Route::post('/branch/show', [BranchController::class, 'show'])->name('branch.show');
    Route::patch('/branch/update', [BranchController::class, 'update'])->name('branch.update');

    Route::get('/departments', [DepartmentController::class, 'index'])->name('departments');
    Route::post('/department/store', [DepartmentController::class, 'store'])->name('department.store');
    Route::post('/department/show', [DepartmentController::class, 'show'])->name('department.show');
    Route::patch('/department/update', [DepartmentController::class, 'update'])->name('department.update');

    Route::get('/designations', [DesignationController::class, 'index'])->name('designations');
    Route::post('/designation/store', [DesignationController::class, 'store'])->name('designation.store');
    Route::post('/designation/show', [DesignationController::class, 'show'])->name('designation.show');
    Route::patch('/designation/update', [DesignationController::class, 'update'])->name('designation.update');

    Route::get('/roles', [RoleController::class, 'index'])->name('roles');
    Route::post('/role/store', [RoleController::class, 'store'])->name('role.store');
    Route::post('/role/show', [RoleController::class, 'show'])->name('role.show');
    Route::patch('/role/update', [RoleController::class, 'update'])->name('role.update');

    Route::get('/countries', [CountryController::class, 'index'])->name('countries');
    Route::post('/country/store', [CountryController::class, 'store'])->name('country.store');
    Route::post('/country/show', [CountryController::class, 'show'])->name('country.show');
    Route::patch('/country/update', [CountryController::class, 'update'])->name('country.update');

    Route::get('/states', [StateController::class, 'index'])->name('states');
    Route::post('/state/store', [StateController::class, 'store'])->name('state.store');
    Route::post('/state/show', [StateController::class, 'show'])->name('state.show');
    Route::patch('/state/update', [StateController::class, 'update'])->name('state.update');

    Route::get('/staffs', [StaffController::class, 'index'])->name('staffs');
    Route::get('/staff/list', [StaffController::class, 'list'])->name('staff.list');
    Route::post('/staff/store', [StaffController::class, 'store'])->name('staff.store');
    Route::post('/staff/show', [StaffController::class, 'show'])->name('staff.show');
    Route::post('/staff/update', [StaffController::class, 'update'])->name('staff.update');
    Route::post('/staff/destroy/', [StaffController::class, 'destroy'])->name('staff.destroy');
    Route::post('/password_reset', [StaffController::class, 'password_reset'])->name('password_reset');

    Route::get('/districts', [DistrictController::class, 'index'])->name('districts');
    Route::post('/district/store', [DistrictController::class, 'store'])->name('district.store');
    Route::post('/district/show', [DistrictController::class, 'show'])->name('district.show');
    Route::post('/district/update', [DistrictController::class, 'update'])->name('district.update');

    Route::get('/leadsources', [LeadsourceController::class, 'index'])->name('leadsources');
    Route::get('/leadsource/list', [LeadsourceController::class, 'list'])->name('leadsource.list');
    Route::post('/leadsource/store', [LeadsourceController::class, 'store'])->name('leadsource.store');
    Route::post('/leadsource/show', [LeadsourceController::class, 'show'])->name('leadsource.show');
    Route::post('/leadsource/update', [LeadsourceController::class, 'update'])->name('leadsource.update');

    Route::get('/leads', [LeadController::class, 'index'])->name('leads');
    Route::get('/lead/list', [LeadController::class, 'list'])->name('lead.list');
    Route::post('/lead/store', [LeadController::class, 'store'])->name('lead.store');
    Route::post('/lead/show', [LeadController::class, 'show'])->name('lead.show');
    Route::post('/lead/update', [LeadController::class, 'update'])->name('lead.update');
    Route::post('/lead/destroy', [LeadController::class, 'destroy'])->name('lead.destroy');

    Route::get('/followups/{id}', [ FollowupController::class, 'index'])->name('followups');
    Route::get('/followup/list/{id}', [ FollowupController::class, 'list'])->name('followup.list');
    Route::post('/followup/store', [ FollowupController::class, 'store'])->name('followup.store');
    Route::post('/followup/show', [ FollowupController::class, 'show'])->name('followup.show');
    Route::post('/followup/update', [ FollowupController::class, 'update'])->name('followup.update');

    Route::get('/prooftypes', [ProoftypeController::class, 'index'])->name('prooftypes');
    Route::get('/prooftype/list', [ProoftypeController::class, 'list'])->name('prooftype.list');
    Route::post('/prooftype/store', [ProoftypeController::class, 'store'])->name('prooftype.store');
    Route::post('/prooftype/show', [ProoftypeController::class, 'show'])->name('prooftype.show');
    Route::post('/prooftype/update', [ProoftypeController::class, 'update'])->name('prooftype.update');

    Route::get('/attendances', [AttendanceController::class, 'index'])->name('attendances');
    Route::get('/attendance/list', [AttendanceController::class, 'list'])->name('attendance.list');

    Route::get('/agents', [AgentController::class, 'index'])->name('agents');
    Route::get('/agent/list', [AgentController::class, 'list'])->name('agent.list');
    Route::post('/agent/store', [AgentController::class, 'store'])->name('agent.store');
    Route::post('/agent/show', [AgentController::class, 'show'])->name('agent.show');
    Route::post('/agent/update', [AgentController::class, 'update'])->name('agent.update');

    Route::get('/companies', [CompanyController::class, 'index'])->name('companies');
    Route::get('/companies/list', [CompanyController::class, 'list'])->name('companies.list');
    Route::post('/companies/store', [CompanyController::class, 'store'])->name('companies.store');
    Route::post('/company/show', [CompanyController::class, 'show'])->name('company.show');
    Route::post('/company/update', [CompanyController::class, 'update'])->name('company.update');

    Route::get('/vehiclemodels', [VehiclemodelController::class, 'index'])->name('vehiclemodels');
    Route::get('/vehiclemodel/list', [VehiclemodelController::class, 'list'])->name('vehiclemodel.list');
    Route::post('/vehiclemodel/store', [VehiclemodelController::class, 'store'])->name('vehiclemodel.store');
    Route::post('/vehiclemodel/show', [VehiclemodelController::class, 'show'])->name('vehiclemodel.show');
    Route::post('/vehiclemodel/update', [VehiclemodelController::class, 'update'])->name('vehiclemodel.update');
    Route::post('/vehiclemodel/search', [VehiclemodelController::class, 'search'])->name('vehiclemodel.search');

    Route::get('/policyholders', [PolicyholderController::class, 'index'])->name('policyholders');
    Route::get('/policyholder/list', [PolicyholderController::class, 'list'])->name('policyholder.list');
    Route::post('/policyholder/store', [PolicyholderController::class, 'store'])->name('policyholder.store');
    Route::post('/policyholder/show', [PolicyholderController::class, 'show'])->name('policyholder.show');
    Route::post('/policyholder/update', [PolicyholderController::class, 'update'])->name('policyholder.update');
    Route::post('/policyholder/assign', [PolicyholderController::class, 'assign'])->name('policyholder.assign');

    Route::get('/dealers', [DealerController::class, 'index'])->name('dealers');
    Route::get('/dealer/list', [DealerController::class, 'list'])->name('dealer.list');
    Route::post('/dealer/store', [DealerController::class, 'store'])->name('dealer.store');
    Route::post('/dealer/show', [DealerController::class, 'show'])->name('dealer.show');
    Route::post('/dealer/update', [DealerController::class, 'update'])->name('dealer.update');

    Route::get('/cards', [CardController::class, 'index'])->name('cards');
    Route::get('/card/list', [CardController::class, 'list'])->name('card.list');
    Route::post('/card/store', [CardController::class, 'store'])->name('card.store');
    Route::post('/card/show', [CardController::class, 'show'])->name('card.show');
    Route::post('/card/update', [CardController::class, 'update'])->name('card.update');

    Route::get('/renews', [RenewController::class, 'index'])->name('renews');
    Route::get('/renew/list/', [RenewController::class, 'list'])->name('renew.list');
    Route::post('/renew/store', [RenewController::class, 'store'])->name('renew.store');
    Route::post('/renew/show', [RenewController::class, 'show'])->name('renew.show');
    Route::post('/renew/update', [RenewController::class, 'update'])->name('renew.update');
    Route::post('/renew/getPolicies', [RenewController::class, 'getPolicies'])->name('renew.getPolicies');

    Route::get('/payments/{id}', [PaymentController::class, 'index'])->name('payments');
    Route::post('/payment/list', [PaymentController::class, 'list'])->name('payment.list');
    Route::post('/payment/store', [PaymentController::class, 'store'])->name('payment.store');
    Route::post('/payment/show', [PaymentController::class, 'show'])->name('payment.show');
    Route::post('/payment/update', [PaymentController::class, 'update'])->name('payment.update');

    Route::get('/creditcard_pay', [CreditCardPayController::class, 'index'])->name('creditcard_pay');
    Route::get('/creditcard_pay/list', [CreditCardPayController::class, 'list'])->name('creditcard_pay.list');
    Route::post('/creditcard_pay/store', [CreditCardPayController::class, 'store'])->name('creditcard_pay.store');
    Route::post('/creditcard_pay/show', [CreditCardPayController::class, 'show'])->name('creditcard_pay.show');
    Route::post('/creditcard_pay/update', [CreditCardPayController::class, 'update'])->name('creditcard_pay.update');
    Route::post('/creditcard_pay/statusupdate', [CreditCardPayController::class, 'statusupdate'])->name('creditcard_pay.statusupdate');

    Route::get('/prepared_policies', [PreparePolicyController::class, 'index'])->name('prepared_policies');
    Route::get('/prepared_policies/list', [PreparePolicyController::class, 'list'])->name('prepared_policies.list');
    Route::post('/prepared_policy/store', [PreparePolicyController::class, 'store'])->name('prepared_policy.store');
    Route::post('/prepared_policy/show', [PreparePolicyController::class, 'show'])->name('prepared_policy.show');
    Route::post('/prepared_policy/update', [PreparePolicyController::class, 'update'])->name('prepared_policy.update');

    Route::get('/referredPersons', [ReferredPersonController::class, 'index'])->name('referredPersons');
    Route::get('/referredPerson/list', [ReferredPersonController::class, 'list'])->name('referredPerson.list');
    Route::post('/referredPerson/store', [ReferredPersonController::class, 'store'])->name('referredPerson.store');
    Route::post('/referredPerson/show', [ReferredPersonController::class, 'show'])->name('referredPerson.show');
    Route::post('/referredPerson/update', [ReferredPersonController::class, 'update'])->name('referredPerson.update');

    Route::get('/insuranceproviders', [InsuranceproviderController::class, 'index'])->name('insuranceproviders');
    Route::get('/insuranceproviders/list', [InsuranceproviderController::class, 'list'])->name('insuranceproviders.list');
    Route::post('/insuranceproviders/store', [InsuranceproviderController::class, 'store'])->name('insuranceproviders.store');
    Route::post('/insuranceproviders/show', [InsuranceproviderController::class, 'show'])->name('insuranceproviders.show');
    Route::post('/insuranceproviders/update', [InsuranceproviderController::class, 'update'])->name('insuranceproviders.update');
    Route::post('/insuranceproviders/destroy/', [InsuranceproviderController::class, 'destroy'])->name('insuranceproviders.destroy');

    Route::get('/expensetypes', [ExpensetypesController::class, 'index'])->name('expensetypes');
    Route::post('/expensetypes/store', [ExpensetypesController::class, 'store'])->name('expensetypes.store');
    Route::post('/expensetypes/edit', [ExpensetypesController::class, 'edit'])->name('expensetypes.edit');
    Route::post('/expensetypes/update', [ExpensetypesController::class, 'update'])->name('expensetypes.update');
    Route::post('/expensetypes/destroy', [ExpensetypesController::class, 'destroy'])->name('expensetypes.destroy');

    Route::get('/expenses', [ExpensesController::class, 'index'])->name('expenses');
    Route::post('/expenses/store', [ExpensesController::class, 'store'])->name('expenses.store');
    Route::post('/expenses/edit', [ExpensesController::class, 'edit'])->name('expenses.edit');
    Route::post('/expenses/update', [ExpensesController::class, 'update'])->name('expenses.update');
    Route::post('/expenses/destroy', [ExpensesController::class, 'destroy'])->name('expenses.destroy');

    Route::get('/policycategories', [PolicycategoryController::class, 'index'])->name('policycategories');
    Route::post('/policycategories/store', [PolicycategoryController::class, 'store'])->name('policycategories.store');
    Route::post('/policycategories/edit', [PolicycategoryController::class, 'edit'])->name('policycategories.edit');
    Route::post('/policycategories/update', [PolicycategoryController::class, 'update'])->name('policycategories.update');
    Route::post('/policycategories/destroy', [PolicycategoryController::class, 'destroy'])->name('policycategories.destroy');

    Route::get('/policydocuments/{id}', [PolicyDocumentController::class, 'index'])->name('policydocuments');
    Route::post('/policydocument/store', [PolicyDocumentController::class, 'store'])->name('policydocument.store');
    Route::post('/policydocument/show', [PolicyDocumentController::class, 'show'])->name('policydocument.show');
    Route::post('/policydocument/update', [PolicyDocumentController::class, 'update'])->name('policydocument.update');
    Route::post('/policydocument/destroy', [PolicyDocumentController::class, 'destroy'])->name('policydocument.destroy');

    Route::get('/tooltypes', [TooltypeController::class, 'index'])->name('tooltypes');
    Route::post('/tooltypes/store', [TooltypeController::class, 'store'])->name('tooltypes.store');
    Route::post('/tooltypes/edit', [TooltypeController::class, 'edit'])->name('tooltypes.edit');
    Route::post('/tooltypes/update', [TooltypeController::class, 'update'])->name('tooltypes.update');
    Route::post('/tooltypes/destroy', [TooltypeController::class, 'destroy'])->name('tooltypes.destroy');

    Route::get('/toolcompanies', [ToolcompanyController::class, 'index'])->name('toolcompanies');
    Route::post('/toolcompanies/store', [ToolcompanyController::class, 'store'])->name('toolcompanies.store');
    Route::post('/toolcompanies/edit', [ToolcompanyController::class, 'edit'])->name('toolcompanies.edit');
    Route::post('/toolcompanies/update', [ToolcompanyController::class, 'update'])->name('toolcompanies.update');
    Route::post('/toolcompanies/destroy', [ToolcompanyController::class, 'destroy'])->name('toolcompanies.destroy');

    Route::get('/healthpolicies', [HealthpoliciesController::class, 'index'])->name('healthpolicies');
    Route::post('/healthpolicies/store', [HealthpoliciesController::class, 'store'])->name('healthpolicies.store');
    Route::post('/healthpolicies/edit', [HealthpoliciesController::class, 'edit'])->name('healthpolicies.edit');
    Route::post('/healthpolicies/update', [HealthpoliciesController::class, 'update'])->name('healthpolicies.update');
    Route::post('/healthpolicies/destroy', [HealthpoliciesController::class, 'destroy'])->name('healthpolicies.destroy');

    Route::get('/otherpolicies', [OtherpoliciesController::class, 'index'])->name('otherpolicies');
    Route::post('/otherpolicies/store', [OtherpoliciesController::class, 'store'])->name('otherpolicies.store');
    Route::post('/otherpolicies/edit', [OtherpoliciesController::class, 'edit'])->name('otherpolicies.edit');
    Route::post('/otherpolicies/update', [OtherpoliciesController::class, 'update'])->name('otherpolicies.update');
    Route::post('/otherpolicies/destroy', [OtherpoliciesController::class, 'destroy'])->name('otherpolicies.destroy');

    Route::get('/loantypes', [LoantypeController::class, 'index'])->name('loantypes');
    Route::post('/loantypes/store', [LoantypeController::class, 'store'])->name('loantypes.store');
    Route::post('/loantypes/edit', [LoantypeController::class, 'edit'])->name('loantypes.edit');
    Route::post('/loantypes/update', [LoantypeController::class, 'update'])->name('loantypes.update');
    Route::post('/loantypes/destroy', [LoantypeController::class, 'destroy'])->name('loantypes.destroy');

    Route::get('/vechiclecategories', [VechiclecategoryController::class, 'index'])->name('vechiclecategories');
    Route::post('/vechiclecategories/store', [VechiclecategoryController::class, 'store'])->name('vechiclecategories.store');
    Route::post('/vechiclecategories/edit', [VechiclecategoryController::class, 'edit'])->name('vechiclecategories.edit');
    Route::post('/vechiclecategories/update', [VechiclecategoryController::class, 'update'])->name('vechiclecategories.update');
    Route::post('/vechiclecategories/destroy', [VechiclecategoryController::class, 'destroy'])->name('vechiclecategories.destroy');

    Route::get('/loans', [LoanController::class, 'index'])->name('loans');
    Route::post('/loans/store', [LoanController::class, 'store'])->name('loans.store');
    Route::post('/loans/edit', [LoanController::class, 'edit'])->name('loans.edit');
    Route::post('/loans/update', [LoanController::class, 'update'])->name('loans.update');
    Route::post('/loans/destroy', [LoanController::class, 'destroy'])->name('loans.destroy');
});
require __DIR__.'/auth.php';
