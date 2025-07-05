<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KeyController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\HallController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\IdealController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\CateringController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\HallPageController;
use App\Http\Controllers\EventItemController;
use App\Http\Controllers\FacilitieController;
use App\Http\Controllers\AccessorieController;
use App\Http\Controllers\HallBokkingController;
use App\Http\Controllers\HallEnquiryController;
use App\Http\Controllers\OurFaciliteController;
use App\Http\Controllers\CateringItemController;
use App\Http\Controllers\EventCateringController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('website.index');
// });

// Redirect if someone tries to access via GET
Route::get('/check-booking-pin', function () {
    return Redirect::route('Index.Page')->with('error', 'Access Denied! Enter PIN first.');
});

Route::get('/',[WebsiteController::class,'index'])->name('Index.Page');
Route::get('/about-us',[WebsiteController::class,'about'])->name('About.Page');
Route::get('/facilities',[WebsiteController::class,'facilities'])->name('Facilities.Page');
Route::get('/contact-us',[WebsiteController::class,'contact'])->name('Contact.Page');

// Route::get('/gallery',[WebsiteController::class,'gallery'])->name('Gallery.Page');
Route::get('/gallery-page',[WebsiteController::class,'gallery'])->name('gallery-page');
Route::get('/halls',[WebsiteController::class,'hall'])->name('Hall');
Route::get('/hall-details/{id}',[WebsiteController::class,'hallDetails'])->name('HallDetail.Page');
Route::get('/enquiry',[WebsiteController::class,'enquiry'])->name('Enquiry.Page');

Route::get('/legal-page/{id}',[WebsiteController::class,'legal'])->name('legal.pages');

Route::post('/enquiry/store', [HallEnquiryController::class, 'store'])->name('enquiry.store');

Route::get('/hall/{id}/privacy-policy', [WebsiteController::class, 'privacyPolicy'])->name('HallPage.Privacy');
// Route::get('/book_now/{booking_code?}', [WebsiteController::class, 'book_now'])->name('Booknow.Page');
Route::post('/check-booking-pin', [WebsiteController::class, 'checkBookingPin'])->name('check.booking.pin');







Route::middleware(['role:event'])->group(function () {
    Route::get('/event-panel', [HomeController::class, 'event'])->name('Event.Dashboard');

    Route::get('/event-booked-halls', [EventCateringController::class, 'eventBookedHalls'])->name('Event.BookedHalls');

    Route::get('/event-booking/{id}', [EventCateringController::class, 'viewEventBooking'])->name('EventView.Booking');

    Route::get('/viewAddEventService/{id}/',[EventCateringController::class,'CreateEventService'])->name('View.AddEventService');

    Route::post('/AddEventService/{booked_hall_id}',[EventCateringController::class,'AddEventService'])->name('Add.EventServices');

    Route::post('/confirm-event/{eventId}', [EventCateringController::class, 'confirmEvent'])->name('confirm.event');


     //Event Item Crud Routes------------------------------------------------------------------------------------------------------------------------------

     Route::get('/item',[EventItemController::class,'index'])->name('Item.Table');

     Route::view('/item/ViewAdd','Event.EventItemCrud.AddItem')->name('View.AddItem');

     Route::post('/item/Additem',[EventItemController::class,'add'])->name('Add.Item');

     Route::get('/Edititem/{id}',[EventItemController::class,'edit'])->name('Edit.Item');

     Route::get('/ViewItem/{id}',[EventItemController::class,'view'])->name('View.Item');

     Route::post('/UpdateItem/{id}',[EventItemController::class,'update'])->name('Update.Item');

     Route::delete('/DeleteItem/{id}',[EventItemController::class,'delete'])->name('Delete.Item');
});

Route::middleware(['role:catering'])->group(function () {
    Route::get('/catering-panel', [HomeController::class, 'catering'])->name('Catering.Dashboard');

    Route::get('/catering-booked-halls', [EventCateringController::class, 'cateringBookedHalls'])->name('Catering.BookedHalls');

    Route::get('/catering-booking/{id}', [EventCateringController::class, 'viewCateringBooking'])->name('CateringView.Booking');

    Route::get('/viewAddCateringService/{id}',[EventCateringController::class,'CreateCateringService'])->name('View.AddCateringService');

    Route::post('/AddCateringService/{booked_hall_id}',[EventCateringController::class,'AddCateringService'])->name('Add.CateringServices');

    Route::post('/confirm-catering/{cateringId}', [EventCateringController::class, 'confirmCatering'])->name('confirm.catering');



     //Catering Item Crud Routes------------------------------------------------------------------------------------------------------------------------------

     Route::get('/itemC',[CateringItemController::class,'index'])->name('ItemC.Table');

     Route::view('/itemC/ViewAdd','Catering.CateringItemCrud.AddItem')->name('View.AddItemC');

     Route::post('/itemC/Additem',[CateringItemController::class,'add'])->name('Add.ItemC');

     Route::get('/EdititemC/{id}',[CateringItemController::class,'edit'])->name('Edit.ItemC');

     Route::get('/ViewItemC/{id}',[CateringItemController::class,'view'])->name('View.ItemC');

     Route::post('/UpdateItemC/{id}',[CateringItemController::class,'update'])->name('Update.ItemC');

     Route::delete('/DeleteItemC/{id}',[CateringItemController::class,'delete'])->name('Delete.ItemC');


});


Auth::routes();




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {
    Route::view('/user-dashboard','website.index');
    Route::view('/admin-dashboard','admin.AdminDashboard');

   //about Routes ----------------------------------------------------
   Route::get('/about',[AboutController::class,'index'])->name('About.Table');
   Route::get('/viewaboutadd',[AboutController::class,'create'])->name('About.add');

   //Route::view('/viewadd','admin.layout.aboutCrud.AddAbout');

   Route::post('/addAbout',[AboutController::class,'addAbout'])->name('Add.About');

   Route::get('/ViewAbout/{id}',[AboutController::class,'ViewAbout'])->name('View.About');

   Route::get('/EditAbout/{id}',[AboutController::class,'editAbout'])->name('Edit.About');

   Route::post('/UpdateAbout/{id}',[AboutController::class,'updateAbout'])->name('Update.About');

   Route::get('/aboutdelete/{id}',[AboutController::class,'deleteAbout'])->name('Delete.about');


    //image routes----------------------------------------------------------------------------------------------------------------------------------------------


    Route::get('/image',[ImageController::class,'index'])->name('Image.Table');

    Route::get('/viewimageadd',[ImageController::class,'create'])->name('Image.Add');


    Route::post('/AddImage',[ImageController::class,'addImage'])->name('Add.Image');

    Route::get('/EditImage/{id}',[ImageController::class,'editImage'])->name('Edit.Image');

    Route::get('/ViewImage/{id}',[ImageController::class,'viewImage'])->name('View.Image');

    Route::post('/UpdateImage/{id}',[ImageController::class,'updateImage'])->name('Update.Image');

    Route::get('/DeleteImage/{id}',[ImageController::class,'deleteImage'])->name('Delete.Image');


     //Contact Routes ------------------------------------------------------------------------------------------------------------------------------------
     Route::get('/admincontacts',[ContactController::class,'index'])->name('Contact.AdminPage');
     Route::get('/viewaddcontact',[ContactController::class,'create'])->name('Contact.AddView');

     //Route::view('/viewadd','admin.layout.aboutCrud.AddAbout');

     Route::post('/addContact',[ContactController::class,'addContact'])->name('Add.Contact');

     Route::get('/ViewContact/{id}',[ContactController::class,'ViewContact'])->name('View.Contact');

     Route::get('/EditContact/{id}',[ContactController::class,'editContact'])->name('Edit.Contact');

     Route::post('/UpdateContact/{id}',[ContactController::class,'updateContact'])->name('Update.Contact');

     Route::get('/deletecontact/{id}',[ContactController::class,'deleteContact'])->name('Delete.Contact');




    //Team Routes------------------------------------------------------------------------------------------------------------------------------

    Route::get('/team',[TeamController::class,'index'])->name('Team.Table');

    Route::view('/team/ViewAdd','admin.teamCrud.AddTeam')->name('View.Add');

    Route::post('/team/AddTeam',[TeamController::class,'addTeam'])->name('Add.Team');

    Route::get('/EditTeam/{id}',[TeamController::class,'editTeam'])->name('Edit.Team');

    Route::get('/ViewTeam/{id}',[TeamController::class,'viewTeam'])->name('View.Team');

    Route::post('/UpdateTeam/{id}',[TeamController::class,'updateTeam'])->name('Update.Team');

    Route::delete('/DeleteTeam/{id}',[TeamController::class,'deleteteam'])->name('Delete.Team');



     //Page routes-----------------------------------------------------------------------------------------------------------------------


     Route::get('/page',[PageController::class,'index'])->name('Page.Table');

     Route::get('/viewpageadd',[PageController::class,'create'])->name('Page.Add');


     Route::post('/AddPage',[PageController::class,'addPage'])->name('Add.Page');

     Route::get('/EditPage/{id}',[PageController::class,'editPage'])->name('Edit.Page');

     Route::get('/ViewPage/{id}',[PageController::class,'ViewPage'])->name('View.Page');

     Route::post('/UpdatePage/{id}',[PageController::class,'updatePage'])->name('Update.Page');

     Route::get('/DeletePage/{id}',[PageController::class,'deletePage'])->name('Delete.Page');






    // Hall Routes (CRUD)---------------------------------------------------------------------------------------------------------------------
    Route::get('/adminhalls', [HallController::class, 'index'])->name('halls.index');

    Route::get('/halls/create', [HallController::class, 'create'])->name('halls.create');

    Route::post('/halls/store', [HallController::class, 'store'])->name('halls.store');

    Route::get('/halls/{id}/edit', [HallController::class, 'edit'])->name('halls.edit');

    Route::post('/halls/{id}', [HallController::class, 'update'])->name('halls.update');

    Route::delete('/halls/{id}', [HallController::class, 'destroy'])->name('halls.destroy');

    Route::get('/halls/{id}', [HallController::class, 'show'])->name('halls.show'); // View more details

    // Hall Image Routes (Multiple Images CRUD)





    //Landing Page Routes ------------------------------------------------------------------------------------------------------------------------
   Route::get('/landing',[LandingController::class,'index'])->name('Landing.Table');
   Route::get('/viewlandingadd',[LandingController::class,'add'])->name('Landing.Add');

   //Route::view('/viewadd','admin.layout.aboutCrud.AddAbout');

   Route::post('/addLanding',[LandingController::class,'store'])->name('Add.Landing');

   Route::get('/ViewLanding/{id}',[LandingController::class,'view'])->name('View.Landing');

   Route::get('/EditLanding/{id}',[LandingController::class,'edit'])->name('Edit.Landing');

   Route::post('/UpdateLanding/{id}',[LandingController::class,'update'])->name('Update.Landing');

   Route::get('/Landingdelete/{id}',[LandingController::class,'delete'])->name('Delete.Landing');




    //Facilities Page Routes --------------------------------------------------------------------------------------------------------------
    Route::get('/facilitie',[FacilitieController::class,'index'])->name('Facilitie.Table');
    Route::get('/viewFacilitiesadd',[FacilitieController::class,'add'])->name('Facilitie.Add');

    //Route::view('/viewadd','admin.layout.aboutCrud.AddAbout');

    Route::post('/addFacilities',[FacilitieController::class,'store'])->name('Add.Facilitie');

    Route::get('/ViewFacilities/{id}',[FacilitieController::class,'view'])->name('View.Facilitie');

    Route::get('/EditFacilities/{id}',[FacilitieController::class,'edit'])->name('Edit.Facilitie');

    Route::post('/UpdateFacilities/{id}',[FacilitieController::class,'update'])->name('Update.Facilitie');

    Route::get('/Facilitiesdelete/{id}',[FacilitieController::class,'delete'])->name('Delete.Facilitie');


     //Testimonials Page Routes --------------------------------------------------------------------------------------------------------------
     Route::get('/testimonials',[TestController::class,'index'])->name('Test.Table');
     Route::get('/addTestimonialsview',[TestController::class,'add'])->name('Test.Add');

     //Route::view('/viewadd','admin.layout.aboutCrud.AddAbout');

     Route::post('/addTestimonials',[TestController::class,'store'])->name('Add.Test');

     Route::get('/ViewTestimonials/{id}',[TestController::class,'view'])->name('View.Test');

     Route::get('/EditTestimonials/{id}',[TestController::class,'edit'])->name('Edit.Test');

     Route::post('/UpdateTestimonials/{id}',[TestController::class,'update'])->name('Update.Test');

     Route::get('/Testimonialsdelete/{id}',[TestController::class,'delete'])->name('Delete.Test');




    //Facilities Page Routes --------------------------------------------------------------------------------------------------------------
    Route::get('/ourfacilitie',[OurFaciliteController::class,'index'])->name('OurFacilitie.Table');
    Route::get('/viewOurFacilitiesadd',[OurFaciliteController::class,'add'])->name('OurFacilitie.Add');

    //Route::view('/viewadd','admin.layout.aboutCrud.AddAbout');

    Route::post('/addOurFacilities',[OurFaciliteController::class,'store'])->name('Add.OurFacilitie');

    Route::get('/ViewOurFacilities/{id}',[OurFaciliteController::class,'view'])->name('View.OurFacilitie');

    Route::get('/EditOurFacilities/{id}',[OurFaciliteController::class,'edit'])->name('Edit.OurFacilitie');

    Route::post('/UpdateOurFacilities/{id}',[OurFaciliteController::class,'update'])->name('Update.OurFacilitie');

    Route::get('/OurFacilitiesdelete/{id}',[OurFaciliteController::class,'delete'])->name('Delete.OurFacilitie');

    //Admin hall enquiry Routes--------------------------------------------------------------------------------------------------------------

    Route::get('/AdminHallEnquiry', [HallEnquiryController::class, 'index'])->name('AdminHallEnquiry');
    Route::get('/ViewHallEnquiry/{id}', [HallEnquiryController::class,'view'])->name('Admin.ViewHallEnquiry');

    Route::post('/AdminStroreOffice/{id}', [HallEnquiryController::class,'storeOffice'])->name('Admin.StoreOffice');


    //Admin hall enquiry Routes--------------------------------------------------------------------------------------------------------------

    //Hall page CRUD Routes--------------------------------------------------------------------------------------------------------------


    Route::get('/hallPage',[HallPageController::class,'index'])->name('HallPage.Table');
    Route::get('/viewHallPageadd',[HallPageController::class,'create'])->name('HallPage.Add');

    //Route::view('/viewadd','admin.layout.aboutCrud.AddAbout');

    Route::post('/addHallPage',[HallPageController::class,'add'])->name('Add.HallPage');

    Route::get('/ViewHallPage/{id}',[HallPageController::class,'view'])->name('View.HallPage');

    Route::get('/EditHallPage/{id}',[HallPageController::class,'edit'])->name('Edit.HallPage');

    Route::post('/UpdateHallPage/{id}',[HallPageController::class,'update'])->name('Update.HallPage');

    Route::get('/HallPagedelete/{id}',[HallPageController::class,'delete'])->name('Delete.HallPage');


    //Accessories Page Routes --------------------------------------------------------------------------------------------------------------
    Route::get('/accessories',[AccessorieController::class,'index'])->name('Accessorie.Table');
    Route::get('/addAccessorieview',[AccessorieController::class,'add'])->name('Accessorie.Add');

    //Route::view('/viewadd','admin.layout.aboutCrud.AddAbout');

    Route::post('/addAccessories',[AccessorieController::class,'store'])->name('Add.Accessorie');

    Route::get('/ViewAccessories/{id}',[AccessorieController::class,'view'])->name('View.Accessorie');

    Route::get('/EditAccessories/{id}',[AccessorieController::class,'edit'])->name('Edit.Accessorie');

    Route::post('/UpdateAccessories/{id}',[AccessorieController::class,'update'])->name('Update.Accessorie');

    Route::get('/Accessoriesdelete/{id}',[AccessorieController::class,'delete'])->name('Delete.Accessorie');


     //Key Fratures Routes ------------------------------------------------------------------------------------------------------------------------------------
     Route::get('/keys',[KeyController::class,'index'])->name('Key.Table');
     Route::get('/viewaddkey',[KeyController::class,'create'])->name('Key.Add');

     //Route::view('/viewadd','admin.layout.aboutCrud.AddAbout');

     Route::post('/addKey',[KeyController::class,'add'])->name('Add.Key');

     Route::get('/ViewKey/{id}',[KeyController::class,'View'])->name('View.Key');

     Route::get('/EditKey/{id}',[KeyController::class,'edit'])->name('Edit.Key');

     Route::post('/UpdateKey/{id}',[KeyController::class,'update'])->name('Update.Key');

     Route::get('/deleteKey/{id}',[KeyController::class,'delete'])->name('Delete.Key');


     //Contact Routes ------------------------------------------------------------------------------------------------------------------------------------
     Route::get('/ideals',[IdealController::class,'index'])->name('Ideal.Table');
     Route::get('/viewaddideals',[IdealController::class,'create'])->name('Ideal.Add');

     //Route::view('/viewadd','admin.layout.aboutCrud.AddAbout');

     Route::post('/addIdeal',[IdealController::class,'add'])->name('Add.Ideal');

     Route::get('/ViewIdeal/{id}',[IdealController::class,'View'])->name('View.Ideal');

     Route::get('/EditIdeal/{id}',[IdealController::class,'edit'])->name('Edit.Ideal');

     Route::post('/UpdateIdeal/{id}',[IdealController::class,'update'])->name('Update.Ideal');

     Route::get('/deleteIdeal/{id}',[IdealController::class,'delete'])->name('Delete.Ideal');



     //Bill Routes -------------------------------------------------------------------------------------------------
     Route::get('/bill/{id}', [BillController::class, 'generateBill'])->name('Generate.Bill');
    //  Route::get('/donationQuotation/{$id}',[BillController::class,'DonationQuotation'])->name('Donation.Quotation');
     Route::get('/donationQuotation/{id}',[BillController::class,'DonationQuotation'])->name('Donation.Quotation');


     //-----------------------------------------------------------------------------------------------------------------

     //Vendor Routes -----------------------------------------------------------------------------------------------------


     //event Vendor Routes ----------------------------------------------------
    Route::get('/event',[EventController::class,'index'])->name('Event.Table');
    Route::get('/vieweventadd',[EventController::class,'create'])->name('Event.add');

    //Route::view('/viewadd','admin.layout.aboutCrud.AddAbout');

    Route::post('/addEvent',[EventController::class,'add'])->name('Add.Event');

    Route::get('/ViewEvent/{id}',[EventController::class,'view'])->name('View.Event');

    Route::get('/EditEvent/{id}',[EventController::class,'edit'])->name('Edit.Event');

    Route::post('/UpdateEvent/{id}',[EventController::class,'update'])->name('Update.Event');

    Route::get('/Eventdelete/{id}',[EventController::class,'delete'])->name('Delete.Event');



     //event Vendor Routes ----------------------------------------------------
     Route::get('/catering',[CateringController::class,'index'])->name('Catering.Table');
     Route::get('/viewcateringadd',[CateringController::class,'create'])->name('Catering.add');

     //Route::view('/viewadd','admin.layout.aboutCrud.AddAbout');

     Route::post('/addCatering',[CateringController::class,'add'])->name('Add.Catering');

     Route::get('/ViewCatering/{id}',[CateringController::class,'view'])->name('View.Catering');

     Route::get('/EditCatering/{id}',[CateringController::class,'edit'])->name('Edit.Catering');

     Route::post('/UpdateCatering/{id}',[CateringController::class,'update'])->name('Update.Catering');

     Route::get('/Cateringdelete/{id}',[CateringController::class,'delete'])->name('Delete.Catering');


     //confirm Booking


    Route::post('/confirm-booking/{id}', [HallBokkingController::class, 'confirmBooking'])->name('Confirm.Booking');

    Route::get('/booked-halls',[HallBokkingController::class, 'index'])->name('Booked.Halls');

    Route::get('/booked-halls/{id}',[HallBokkingController::class, 'view'])->name('View.Booking');

    Route::get('/ViewEventCatering/{id}', [HallBokkingController::class, 'ViewEventCatering'])->name('View.EventCatering');

    Route::post('/update-status', [HallBokkingController::class, 'updateStatus'])->name('update.status');





    //donation Routes

    Route::get('/donation',[DonationController::class,'index'])->name('Donation.Table');
    Route::get('/AddviewDonation',[DonationController::class,'create'])->name('View.AddDonation');
    Route::post('/AddDonation',[DonationController::class,'store'])->name('Add.Donation');

    Route::get('/DeleteDonation/{id}',[DonationController::class,'delete'])->name('Delete.Donation');

    Route::get('/viewDonation/{id}',[DonationController::class,'view'])->name('View.Donation');

    //Catering Routes








});
