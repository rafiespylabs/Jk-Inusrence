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
use App\Http\Controllers\VehiclepolicyRenewController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CreditCardPayController;
use App\Http\Controllers\PreparePolicyController;
use App\Http\Controllers\ReferredPersonController;
use App\Http\Controllers\InsuranceproviderController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\ExpensetypesController;
use App\Http\Controllers\PolicycategoryController;
use App\Http\Controllers\VehcilePolicyDocumentController;
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
use App\Http\Controllers\HealthPolicyMemberController;
use App\Http\Controllers\HealthPolicyDocumentController;
use App\Http\Controllers\HealthpolicyRenewController;
use App\Http\Controllers\OtherPolicyDocumentController;
use App\Http\Controllers\OtherpolicyRenewController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PolicyPaymentController;
use App\Http\Controllers\RePaymentController;
use App\Http\Controllers\PurchaseCardController;
use App\Http\Controllers\PurchasetypeController;
use App\Http\Controllers\SaletypeController;
use App\Http\Controllers\ServicecodeController;
use App\Http\Controllers\StocktypeController;
use App\Http\Controllers\HsncodeController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseItemsController;
use App\Http\Controllers\OpeningstockController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\MultiexpenseController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\CareofpersonController;
use App\Http\Controllers\MotorVehicleReportController;
use App\Http\Controllers\BusinesscategoryController;
use App\Http\Controllers\DayworkController;
use App\Http\Controllers\DayworkTransController;
use App\Http\Controllers\DayworkPaymentsController;
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

    Route::any('/agents', [AgentController::class, 'index'])->name('agents');
    Route::get('/agent/list', [AgentController::class, 'list'])->name('agent.list');
    Route::post('/agent/store', [AgentController::class, 'store'])->name('agent.store');
    Route::post('/agent/show', [AgentController::class, 'show'])->name('agent.show');
    Route::post('/agent/update', [AgentController::class, 'update'])->name('agent.update');

    Route::any('/companies', [CompanyController::class, 'index'])->name('companies');
    Route::get('/companies/list', [CompanyController::class, 'list'])->name('companies.list');
    Route::post('/companies/store', [CompanyController::class, 'store'])->name('companies.store');
    Route::post('/company/show', [CompanyController::class, 'show'])->name('company.show');
    Route::post('/company/update', [CompanyController::class, 'update'])->name('company.update');

    Route::any('/vehiclemodels', [VehiclemodelController::class, 'index'])->name('vehiclemodels');
    Route::post('/vehiclemodels/store', [VehiclemodelController::class, 'store'])->name('vehiclemodels.store');
    Route::post('/vehiclemodels/edit', [VehiclemodelController::class, 'edit'])->name('vehiclemodels.edit');
    Route::post('/vehiclemodels/update', [VehiclemodelController::class, 'update'])->name('vehiclemodels.update');
    Route::post('/vehiclemodels/destroy', [VehiclemodelController::class, 'destroy'])->name('vehiclemodels.destroy');
    Route::post('/vehiclemodels/search', [VehiclemodelController::class, 'search'])->name('vehiclemodels.search');

    Route::get('/policyholders', [PolicyholderController::class, 'index'])->name('policyholders');
    Route::get('/policyholder/list', [PolicyholderController::class, 'list'])->name('policyholder.list');
    Route::post('/policyholder/store', [PolicyholderController::class, 'store'])->name('policyholder.store');
    Route::post('/policyholder/show', [PolicyholderController::class, 'show'])->name('policyholder.show');
    Route::post('/policyholder/update', [PolicyholderController::class, 'update'])->name('policyholder.update');
    Route::post('/policyholder/assign', [PolicyholderController::class, 'assign'])->name('policyholder.assign');

    Route::any('/dealers', [DealerController::class, 'index'])->name('dealers');
    Route::get('/dealer/list', [DealerController::class, 'list'])->name('dealer.list');
    Route::post('/dealer/store', [DealerController::class, 'store'])->name('dealer.store');
    Route::post('/dealer/show', [DealerController::class, 'show'])->name('dealer.show');
    Route::post('/dealer/update', [DealerController::class, 'update'])->name('dealer.update');

    Route::get('/cards', [CardController::class, 'index'])->name('cards');
    Route::get('/card/list', [CardController::class, 'list'])->name('card.list');
    Route::post('/card/store', [CardController::class, 'store'])->name('card.store');
    Route::post('/card/show', [CardController::class, 'show'])->name('card.show');
    Route::post('/card/update', [CardController::class, 'update'])->name('card.update');

    Route::get('/vechicle_policyrenews/{id}', [VehiclepolicyRenewController::class, 'index'])->name('vechicle_policyrenews');
    Route::post('/vechicle_policyrenew/list/', [VehiclepolicyRenewController::class, 'list'])->name('vechicle_policyrenew.list');
    Route::post('/vechicle_policyrenew/store', [VehiclepolicyRenewController::class, 'store'])->name('vechicle_policyrenew.store');
    Route::post('/vechicle_policyrenew/show', [VehiclepolicyRenewController::class, 'show'])->name('vechicle_policyrenew.show');
    Route::post('/vechicle_policyrenew/update', [VehiclepolicyRenewController::class, 'update'])->name('vechicle_policyrenew.update');
    Route::post('/vechicle_policyrenew/getPolicies', [VehiclepolicyRenewController::class, 'getPolicies'])->name('vechicle_policyrenew.getPolicies');

    Route::get('/payments', [PaymentController::class, 'index'])->name('payments');
    Route::post('/payment/list', [PaymentController::class, 'list'])->name('payment.list');
    Route::post('/payment/store', [PaymentController::class, 'store'])->name('payment.store');
    Route::post('/payment/show', [PaymentController::class, 'show'])->name('payment.show');
    Route::post('/payment/update', [PaymentController::class, 'update'])->name('payment.update');
    Route::post('/payment/getPolicyByCategory', [PaymentController::class, 'getPolicyByCategory'])->name('payment.getPolicyByCategory');
    Route::post('/payment/getPolicyDetails', [PaymentController::class, 'getPolicyDetails'])->name('payment.getPolicyDetails');

    Route::get('/creditcard_pay', [CreditCardPayController::class, 'index'])->name('creditcard_pay');
    Route::any('/creditcard_pay/list', [CreditCardPayController::class, 'list'])->name('creditcard_pay.list');
    Route::post('/creditcard_pay/store', [CreditCardPayController::class, 'store'])->name('creditcard_pay.store');
    Route::post('/creditcard_pay/show', [CreditCardPayController::class, 'show'])->name('creditcard_pay.show');
    Route::post('/creditcard_pay/update', [CreditCardPayController::class, 'update'])->name('creditcard_pay.update');
    Route::post('/creditcard_pay/statusupdate', [CreditCardPayController::class, 'statusupdate'])->name('creditcard_pay.statusupdate');

    Route::get('/prepared_policies', [PreparePolicyController::class, 'index'])->name('prepared_policies');
    Route::post('/prepared_policies/list', [PreparePolicyController::class, 'list'])->name('prepared_policies.list');
    Route::post('/prepared_policy/store', [PreparePolicyController::class, 'store'])->name('prepared_policy.store');
    Route::post('/prepared_policy/show', [PreparePolicyController::class, 'show'])->name('prepared_policy.show');
    Route::post('/prepared_policy/update', [PreparePolicyController::class, 'update'])->name('prepared_policy.update');

    Route::any('/referredPersons', [ReferredPersonController::class, 'index'])->name('referredPersons');
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

    Route::get('/vehicle_policydocuments/{id}', [VehcilePolicyDocumentController::class, 'index'])->name('vehicle_policydocuments');
    Route::post('/vehicle_policydocument/store', [VehcilePolicyDocumentController::class, 'store'])->name('vehicle_policydocument.store');
    Route::post('/vehicle_policydocument/show', [VehcilePolicyDocumentController::class, 'show'])->name('vehicle_policydocument.show');
    Route::post('/vehicle_policydocument/update', [VehcilePolicyDocumentController::class, 'update'])->name('vehicle_policydocument.update');
    Route::post('/vehicle_policydocument/destroy', [VehcilePolicyDocumentController::class, 'destroy'])->name('vehicle_policydocument.destroy');

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

    Route::get('/healthPolicyMembers/{id}', [HealthPolicyMemberController::class, 'index'])->name('healthPolicyMembers');
    Route::post('/healthPolicyMember/store', [HealthPolicyMemberController::class, 'store'])->name('healthPolicyMember.store');
    Route::post('/healthPolicyMember/show', [HealthPolicyMemberController::class, 'show'])->name('healthPolicyMember.show');
    Route::post('/healthPolicyMember/update', [HealthPolicyMemberController::class, 'update'])->name('healthPolicyMember.update');

    Route::get('/healthPolicyDocs/{id}', [HealthPolicyDocumentController::class, 'index'])->name('healthPolicyDocs');
    Route::post('/healthPolicyDoc/store', [HealthPolicyDocumentController::class, 'store'])->name('healthPolicyDoc.store');
    Route::post('/healthPolicyDoc/show', [HealthPolicyDocumentController::class, 'show'])->name('healthPolicyDoc.show');
    Route::post('/healthPolicyDoc/update', [HealthPolicyDocumentController::class, 'update'])->name('healthPolicyDoc.update');

    Route::get('/healthPolicyRenew/{id}', [HealthpolicyRenewController::class, 'index'])->name('healthPolicyRenew');
    Route::post('/healthPolicyRenew/store', [HealthpolicyRenewController::class, 'store'])->name('healthPolicyRenew.store');

    Route::get('/otherPolicyDocs/{id}', [OtherPolicyDocumentController::class, 'index'])->name('otherPolicyDocs');
    Route::post('/otherPolicyDoc/store', [OtherPolicyDocumentController::class, 'store'])->name('otherPolicyDoc.store');
    Route::post('/otherPolicyDoc/show', [OtherPolicyDocumentController::class, 'show'])->name('otherPolicyDoc.show');
    Route::post('/otherPolicyDoc/update', [OtherPolicyDocumentController::class, 'update'])->name('otherPolicyDoc.update');

    Route::get('/otherPolicyRenew/{id}', [OtherpolicyRenewController::class, 'index'])->name('otherPolicyRenew');
    Route::post('/otherPolicyRenew/store', [OtherpolicyRenewController::class, 'store'])->name('otherPolicyRenew.store');

    //Tyres
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::post('/categories/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/categories/update', [CategoryController::class, 'update'])->name('categories.update');
    Route::post('/categories/destroy', [CategoryController::class, 'destroy'])->name('categories.destroy');

    Route::get('/subcategories', [SubcategoryController::class, 'index'])->name('subcategories');
    Route::post('/subcategories/store', [SubcategoryController::class, 'store'])->name('subcategories.store');
    Route::post('/subcategories/edit', [SubcategoryController::class, 'edit'])->name('subcategories.edit');
    Route::post('/subcategories/update', [SubcategoryController::class, 'update'])->name(name: 'subcategories.update');
    Route::post('/subcategories/destroy', [SubcategoryController::class, 'destroy'])->name('subcategories.destroy');

    Route::get('/units', [UnitController::class, 'index'])->name('units');
    Route::post('/units/store', [UnitController::class, 'store'])->name('units.store');
    Route::post('/units/edit', [UnitController::class, 'edit'])->name('units.edit');
    Route::post('/units/update', [UnitController::class, 'update'])->name('units.update');
    Route::post('/units/destroy', [UnitController::class, 'destroy'])->name('units.destroy');

    Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers');
    Route::post('/suppliers/store', [SupplierController::class, 'store'])->name('suppliers.store');
    Route::post('/suppliers/edit', [SupplierController::class, 'edit'])->name('suppliers.edit');
    Route::post('/suppliers/update', [SupplierController::class, 'update'])->name('suppliers.update');
    Route::post('/suppliers/destroy', [SupplierController::class, 'destroy'])->name('suppliers.destroy');

    Route::get('/clients', [ClientController::class, 'index'])->name('clients');
    Route::post('/clients/store', [ClientController::class, 'store'])->name('clients.store');
    Route::post('/clients/edit', [ClientController::class, 'edit'])->name('clients.edit');
    Route::post('/clients/update', [ClientController::class, 'update'])->name('clients.update');
    Route::post('/clients/destroy', [ClientController::class, 'destroy'])->name('clients.destroy');

    Route::get('/items', [ItemController::class, 'index'])->name('items');
    Route::post('/items/store', [ItemController::class, 'store'])->name('items.store');
    Route::post('/items/edit', [ItemController::class, 'edit'])->name('items.edit');
    Route::post('/items/update', [ItemController::class, 'update'])->name('items.update');
    Route::post('/items/destroy', [ItemController::class, 'destroy'])->name('items.destroy');
    Route::get('/items/{id}', [ItemController::class, 'getHsnValue'])->name('hsncodes.get');
    Route::post('/get-subcategories', [ItemController::class, 'getSubcategories'])->name('get.subcategories');
    Route::post('/item/getbatches', [ItemController::class, 'getbatches'])->name('item.getbatches');

    Route::get('/policypayments/{pcatid}/{pid}', [PolicyPaymentController::class, 'index'])->name('policypayments');
    Route::post('/policypayment/list', [PolicyPaymentController::class, 'list'])->name('policypayment.list');
    Route::post('/policypayment/store', [PolicyPaymentController::class, 'store'])->name('policypayment.store');
    Route::post('/policypayment/show', [PolicyPaymentController::class, 'show'])->name('policypayment.show');
    Route::post('/policypayment/update', [PolicyPaymentController::class, 'update'])->name('policypayment.update');

    Route::get('/credit_repayment/{id}', [RePaymentController::class, 'index'])->name('credit_repayment');
    Route::any('/credit_repayment/list', [RePaymentController::class, 'list'])->name('credit_repayment.list');
    Route::post('/credit_repayment/store', [RePaymentController::class, 'store'])->name('credit_repayment.store');
    Route::post('/credit_repayment/show', [RePaymentController::class, 'show'])->name('credit_repayment.show');
    Route::post('/credit_repayment/update', [RePaymentController::class, 'update'])->name('credit_repayment.update');
    Route::post('/credit_repayment/status_update', [RePaymentController::class, 'status_update'])->name('credit_repayment.status_update');

    Route::get('/purchase_cards/{pcatid}/{pid}', [PurchaseCardController::class, 'index'])->name('purchase_cards');
    Route::any('/purchase_card/list', [PurchaseCardController::class, 'list'])->name('purchase_card.list');
    Route::post('/purchase_card/store', [PurchaseCardController::class, 'store'])->name('purchase_card.store');
    Route::post('/purchase_card/getCardBalance', [PurchaseCardController::class, 'getCardBalance'])->name('purchase_card.getCardBalance');

//  Billing Typre

    Route::get('/saletypes', [SaletypeController::class, 'index'])->name('saletypes');
    Route::post('/saletypes/store', [SaletypeController::class, 'store'])->name('saletypes.store');
    Route::post('/saletypes/edit', [SaletypeController::class, 'edit'])->name('saletypes.edit');
    Route::post('/saletypes/update', [SaletypeController::class, 'update'])->name('saletypes.update');
    Route::post('/saletypes/destroy', [SaletypeController::class, 'destroy'])->name('saletypes.destroy');

    Route::get('/purchasetypes', [PurchasetypeController::class, 'index'])->name('purchasetypes');
    Route::post('/purchasetypes/store', [PurchasetypeController::class, 'store'])->name('purchasetypes.store');
    Route::post('/purchasetypes/edit', [PurchasetypeController::class, 'edit'])->name('purchasetypes.edit');
    Route::post('/purchasetypes/update', [PurchasetypeController::class, 'update'])->name('purchasetypes.update');
    Route::post('/purchasetypes/destroy', [PurchasetypeController::class, 'destroy'])->name('purchasetypes.destroy');

    Route::get('/servicecodes', [ServicecodeController::class, 'index'])->name('servicecodes');
    Route::post('/servicecodes/store', [ServicecodeController::class, 'store'])->name('servicecodes.store');
    Route::post('/servicecodes/edit', [ServicecodeController::class, 'edit'])->name('servicecodes.edit');
    Route::post('/servicecodes/update', [ServicecodeController::class, 'update'])->name('servicecodes.update');
    Route::post('/servicecodes/destroy', [ServicecodeController::class, 'destroy'])->name('servicecodes.destroy');

    Route::get('/hsncodes', [HsncodeController::class, 'index'])->name('hsncodes');
    Route::post('/hsncodes/store', [HsncodeController::class, 'store'])->name('hsncodes.store');
    Route::post('/hsncodes/edit', [HsncodeController::class, 'edit'])->name('hsncodes.edit');
    Route::post('/hsncodes/update', [HsncodeController::class, 'update'])->name('hsncodes.update');
    Route::post('/hsncodes/destroy', [HsncodeController::class, 'destroy'])->name('hsncodes.destroy');

    Route::get('/stocktypes', [StocktypeController::class, 'index'])->name('stocktypes');
    Route::post('/stocktypes/store', [StocktypeController::class, 'store'])->name('stocktypes.store');
    Route::post('/stocktypes/edit', [StocktypeController::class, 'edit'])->name('stocktypes.edit');
    Route::post('/stocktypes/update', [StocktypeController::class, 'update'])->name('stocktypes.update');
    Route::post('/stocktypes/destroy', [StocktypeController::class, 'destroy'])->name('stocktypes.destroy');

    Route::get('/openstocks', [OpeningstockController::class, 'index'])->name('openstocks');
    Route::post('/openstocks/list', [OpeningstockController::class, 'list'])->name('openstocks.list');    
    Route::post('/openstocks/fetch', [OpeningstockController::class, 'fetch'])->name('openstocks.fetch');
    Route::post('/openstocks/store', [OpeningstockController::class, 'store'])->name('openstocks.store');
    Route::get('/openstocks/{id}/edit', [OpeningstockController::class, 'edit'])->name('openstocks.edit');   
    Route::post('/openstocks/update', [OpeningstockController::class, 'update'])->name('openstocks.update');
    Route::post('/openstocks/destroy', [OpeningstockController::class, 'destroy'])->name('openstocks.destroy');

    Route::get('/purchases', [PurchaseController::class, 'index'])->name('purchases');
    Route::any('/purchase/list', [PurchaseController::class, 'list'])->name('purchase.list');
    Route::get('/purchase/create', [PurchaseController::class, 'create'])->name('purchase.create');
    Route::post('/purchase/store', [PurchaseController::class, 'store'])->name('purchase.store');
    Route::post('/purchase/storePurchase', [PurchaseController::class, 'storePurchase'])->name('purchase.storePurchase');

    Route::get('/purchaseitems/{id}', [PurchaseItemsController::class, 'index'])->name('purchaseitems');
    Route::any('/purchaseitem/list', [PurchaseItemsController::class, 'list'])->name('purchaseitem.list');
    Route::get('/purchaseitem/addItems/{id}', [PurchaseItemsController::class, 'addItems'])->name('purchaseitem.addItems');
    Route::get('/purchaseitem/calculateTotals', [PurchaseItemsController::class, 'calculateTotals'])->name('purchaseitem.calculateTotals');
    Route::post('/purchaseitem/saveItems', [PurchaseItemsController::class, 'storePurchaseDetails'])->name('purchaseitem.saveItems');
    Route::post('/purchaseitem/getItemDetails', [PurchaseItemsController::class, 'getItemDetails'])->name('purchaseitem.getItemDetails');
    Route::post('/purchaseitem/getBatchForItem', [PurchaseItemsController::class, 'getBatchForItem'])->name('purchaseitem.getBatchForItem');
    Route::post('/purchaseitem/addBatch', [PurchaseItemsController::class, 'addBatch'])->name('purchaseitem.addBatch');

    Route::get('/sales', [SaleController::class, 'index'])->name('sales');
    Route::any('/sale/list', [SaleController::class, 'list'])->name('sale.list');
    Route::get('/sale/create', [SaleController::class, 'create'])->name('sale.create');
    Route::post('/sale/getsale_rate', [SaleController::class, 'getsale_rate'])->name('sale.getsale_rate');
    Route::post('/sale/getHsn', [SaleController::class, 'getHsn'])->name('sale.getHsn');
    Route::post('/sale/store', [SaleController::class, 'store'])->name('sale.store');

    Route::get('/multiexpenses', [MultiexpenseController::class, 'index'])->name('multiexpenses');
    Route::post('/multiexpenses/store', [MultiexpenseController::class, 'store'])->name('multiexpenses.store');
    Route::post('/multiexpenses/edit', [MultiexpenseController::class, 'edit'])->name('multiexpenses.edit');
    Route::post('/multiexpenses/update', [MultiexpenseController::class, 'update'])->name('multiexpenses.update');
    Route::post('/multiexpenses/destroy', [MultiexpenseController::class, 'destroy'])->name('multiexpenses.destroy');

    Route::get('/manufacturers', [ManufacturerController::class, 'index'])->name('manufacturers');
    Route::post('/manufacturers/store', [ManufacturerController::class, 'store'])->name('manufacturers.store');
    Route::post('/manufacturers/edit', [ManufacturerController::class, 'edit'])->name('manufacturers.edit');
    Route::post('/manufacturers/update', [ManufacturerController::class, 'update'])->name('manufacturers.update');
    Route::post('/manufacturers/destroy', [ManufacturerController::class, 'destroy'])->name('manufacturers.destroy');

    Route::get('/careofpersons', [CareofpersonController::class, 'index'])->name('careofpersons');
    Route::post('/careofpersons/list', [CareofpersonController::class, 'list'])->name('careofpersons.list');
    Route::post('/careofpersons/store', [CareofpersonController::class, 'store'])->name('careofpersons.store');
    Route::get('/careofpersons/{id}/edit', [CareofpersonController::class, 'edit'])->name('careofpersons.edit');
    Route::post('/careofpersons/update/{id}', [CareofpersonController::class, 'update'])->name('careofpersons.update');
    Route::delete('/careofpersons/{id}', [CareofpersonController::class, 'destroy'])->name('careofpersons.destroy');

    Route::get('/businesscategories', [BusinesscategoryController::class, 'index'])->name('businesscategories');
    Route::post('/businesscategories/store', [BusinesscategoryController::class, 'store'])->name('businesscategories.store');
    Route::post('/businesscategories/edit', [BusinesscategoryController::class, 'edit'])->name('businesscategories.edit');
    Route::post('/businesscategories/update', [BusinesscategoryController::class, 'update'])->name('businesscategories.update');
    Route::post('/businesscategories/destroy', [BusinesscategoryController::class, 'destroy'])->name('businesscategories.destroy');

    Route::get('/motorVehicleReport', [MotorVehicleReportController::class, 'index'])->name('motorVehicleReport');
    Route::get('/motorVehicleReport/report', [MotorVehicleReportController::class, 'report'])->name('motorVehicleReport.report');

    Route::get('/dayworks', [DayworkController::class, 'index'])->name('dayworks');
    Route::any('/daywork/list', [DayworkController::class, 'list'])->name('daywork.list');
    Route::post('/daywork/store', [DayworkController::class, 'store'])->name('daywork.store');

    Route::get('/daywork_trans/{id}', [DayworkTransController::class, 'index'])->name('daywork_trans');    
    Route::any('/daywork_trans/list', [DayworkTransController::class, 'list'])->name('daywork_trans.list');
    Route::post('/daywork_trans/store', [DayworkTransController::class, 'store'])->name('daywork_trans.store');

    Route::get('/daywork_payments/{id}', [ DayworkPaymentsController::class, 'index'])->name('daywork_payments'); 
    Route::any('/daywork_payment/list', [ DayworkPaymentsController::class, 'list'])->name('daywork_payment.list');    
    Route::post('/daywork_payment/store', [ DayworkPaymentsController::class, 'store'])->name('daywork_payment.store');    
});
require __DIR__.'/auth.php';
