<?php
session_start();

require_once './commons/global.php';
require_once './commons/helper.php';
require_once './commons/validate.php';
require_once './dao/functions.php';
require_once './dao/connect_DB.php';

$url = isset($_GET['url']) ? $_GET['url'] : "/";
switch ($url) {
        //----------------------------HOMEPAGE---DETAIL---COMMENT--------------------------------
    case '/':
        require_once './business/client/clientpage.php';
        client_homepage();
        break;
    case 'detail':
        require_once './business/client/clientpage.php';
        client_detail();
        break;
        //// tìm kiếm 
    case 'tour-by-category':
        require_once './business/client/clientpage.php';
        client_homepage();
        break;
    case 'search-tour':
        require_once './business/client/clientpage.php';
        client_homepage();
        break;
        // gioi thieu 
    case 'infor':
        require_once './business/client/clientpage.php';
        client_infor();
        break;
    case 'save-comment':
        require_once './business/client/clientpage.php';
        client_comment();
        break;
        //đơn hàng
    case 'order':
        require_once './business/client/clientpage.php';
        client_order();
        break;
        //thanh toán
    case 'pay':
        require_once './business/client/clientpage.php';
        client_pay();
        break;
    case 'save-pay':
        require_once './business/client/clientpage.php';
        client_save_pay();
        break;
        //----------------------------LOGIN---LOGOUT---SIGN-UP---CLIENT---------------------------
    case 'login':
        require_once './business/client/log.php';
        client_login_form();
        break;
    case 'save-login':
        require_once './business/client/log.php';
        client_login();
        break;
    case 'log-out':
        require_once './business/client/log.php';
        client_log_out();
        break;
    case 'sign-up':
        require_once './business/client/log.php';
        client_sign_up_form();
        break;
    case 'save-sign-up':
        require_once './business/client/log.php';
        client_sign_up();
        break;
    case 'check-code-form':
        require_once './business/client/log.php';
        client_check_code_form();
        break;
    case 'check-code':
        require_once './business/client/log.php';
        client_check_code();
        break;
    case 'send-mail':
        require_once './business/client/log.php';
        client_sendmail();
        break;
    // ------------------------------FORGOT PASSWORD---------------------------------------
    case 'forgot-password':
        require_once './business/client/log.php';
        client_check_email_form();
        break;
    case 'checkEmail': 
        require_once './business/client/log.php';
        client_check_email();
        break;
    case 'change-password-form':
        require_once './business/client/log.php';
        client_change_pass_form();
        break;
    case 'change-password':
        require_once './business/client/log.php';
        client_change_pass();
        break;
    // ---------------------------CHANGE INFO USER---------------------------------------
    case 'client/edit-info': 
        require_once './business/client/log.php';
        client_edit_info();
        break;
    case 'client/save-info':
        require_once './business/client/log.php';
        client_save_edit_info();
        break;
    // ----------------------------CHANGE PASSWORD---------------------------------------
    case 'client/edit-password': 
        require_once './business/client/log.php';
        client_edit_password();
        break;
    case 'client/save-edit-password': 
        require_once './business/client/log.php';
        client_save_edit_password();
        break;
    //-------------------------DASHBROARD---LOGIN/LOGOUT---ADMIN-------------------------
    case 'admin':
        require_once './business/admin/dashbroard.php';
        admin_dashbroard();
        break;
    case 'admin/login':
        require_once './business/admin/log.php';
        admin_login();
        break;
    case 'admin/save-login':
        require_once './business/admin/log.php';
        admin_save_login();
        break;
    case 'admin/logout':
        require_once './business/admin/log.php';
        admin_logout();
        break;
    
         //------------------------------FORGOT PASWORD ADMIN---------------------------------
    case 'admin/forgot-password':
        require_once './business/admin/log.php';
        admin_check_email_form();
        break;
    case 'admin/checkEmail': 
        require_once './business/admin/log.php';
        admin_check_email();
        break;
    case 'admin/change-password-form':
        require_once './business/admin/log.php';
        admin_change_pass_form();
        break;
    case 'admin/change-password':
        require_once './business/admin/log.php';
        admin_change_pass();
        break;
    case 'admin/check-code-form':
        require_once './business/admin/log.php';
        admin_check_code_form();
        break;
    case 'admin/check-code':
        require_once './business/admin/log.php';
        admin_check_code();
        break;
    case 'admin/send-mail':
        require_once './business/admin/log.php';
        admin_sendmail();
        break;
    //------------------------------Edit thông tin admin-----------------
    case 'admin/edit-info':
        require_once './business/admin/log.php';
        admin_edit_info();
        break;
    case 'admin/save-info':
        require_once './business/admin/log.php';
        admin_save_edit_info();
        break;
    //------------------------------Edit Password admin-----------------
    case 'admin/edit-password':
        require_once './business/admin/log.php';
        admin_edit_password();
        break;
    case 'admin/save-password':
        require_once './business/admin/log.php';
        admin_save_edit_password();
        break;
        //----------------------------------------MANAGE--VEHICLE------------------------------------------
    case 'admin/vehicle/list':
        require_once './business/admin/vehicle.php';
        vehicle_list();
        break;
    case 'admin/vehicle/add':
        require_once './business/admin/vehicle.php';
        vehicle_add();
        break;
    case 'admin/vehicle/save-add':
        require_once './business/admin/vehicle.php';
        vehicle_save_add();
        break;
    case 'admin/vehicle/update':
        require_once './business/admin/vehicle.php';
        vehicle_update();
        break;
    case 'admin/vehicle/save-update':
        require_once './business/admin/vehicle.php';
        vehicle_save_update();
        break;
    case 'admin/vehicle/delete':
        require_once './business/admin/vehicle.php';
        vehicle_delete();
        break;
    case 'admin/vehicle/status':
        require_once './business/admin/vehicle.php';
        vehicle_status();
        break;
        //------------------------------------------MANAGE--TOUR----------------------------------------------
    case 'admin/tour/list':
        require_once './business/admin/tour.php';
        tour_list();
        break;
    case 'admin/tour/add':
        require_once './business/admin/tour.php';
        tour_add();
        break;
    case 'admin/tour/save-add':
        require_once './business/admin/tour.php';
        tour_save_add();
        break;
    case 'admin/tour/update':
        require_once './business/admin/tour.php';
        tour_update();
        break;
    case 'admin/tour/save-update':
        require_once './business/admin/tour.php';
        tour_save_update();
        break;
    case 'admin/tour/status':
        require_once './business/admin/tour.php';
        tour_status();
        break;
    case 'admin/tour/delete':
        require_once './business/admin/tour.php';
        tour_delete();
        break;
        //-------------------------------------------MANAGE--ADDRESS------------------------------------------
    case 'admin/address/list':
        require_once './business/admin/address.php';
        address_list();
        break;
    case 'admin/address/add':
        require_once './business/admin/address.php';
        address_add();
        break;
    case 'admin/address/save-add':
        require_once './business/admin/address.php';
        address_save_add();
        break;
    case 'admin/address/update':
        require_once './business/admin/address.php';
        address_update();
        break;
    case 'admin/address/save-update':
        require_once './business/admin/address.php';
        address_save_update();
        break;
    case 'admin/address/status':
        require_once './business/admin/address.php';
        address_status();
        break;
    case 'admin/address/delete':
        require_once './business/admin/address.php';
        address_delete();
        break;
        //------------------------------------------MANAGE--HOTEL----------------------------------------------
    case 'admin/hotel/list':
        require_once './business/admin/hotel.php';
        hotel_list();
        break;
    case 'admin/hotel/add':
        require_once './business/admin/hotel.php';
        hotel_add();
        break;
    case 'admin/hotel/save-add':
        require_once './business/admin/hotel.php';
        hotel_save_add();
        break;
    case 'admin/hotel/update':
        require_once './business/admin/hotel.php';
        hotel_update();
        break;
    case 'admin/hotel/save-update':
        require_once './business/admin/hotel.php';
        hotel_save_update();
        break;
    case 'admin/hotel/delete':
        require_once './business/admin/hotel.php';
        hotel_delete();
        break;
    case 'admin/hotel/status':
        require_once './business/admin/hotel.php';
        hotel_status();
        break;
        //-------------------------------------------MANAGE--USER-----------------------------------------------
    case 'admin/user/list':
        require_once './business/admin/user.php';
        user_list();
        break;
    case 'admin/user/add':
        require_once './business/admin/user.php';
        user_add();
        break;
    case 'admin/user/save-add':
        require_once './business/admin/user.php';
        user_save_add();
        break;
    case 'admin/user/update':
        require_once './business/admin/user.php';
        user_update();
        break;
    case 'admin/user/save-update':
        require_once './business/admin/user.php';
        user_save_update();
        break;
    case 'admin/user/delete':
        require_once './business/admin/user.php';
        user_delete();
        break;
    case 'admin/user/status':
        require_once './business/admin/user.php';
        user_status();
        break;
        //-------------------------------------------MANAGE--ORDER-----------------------------------------------
    case 'admin/order/list':
        require_once './business/admin/order.php';
        order_list();
        break;
    case 'admin/order/add':
        require_once './business/admin/order.php';
        order_add();
        break;
    case 'admin/order/save-add':
        require_once './business/admin/order.php';
        order_save_add();
        break;
    case 'admin/order/update':
        require_once './business/admin/order.php';
        order_update();
        break;
    case 'admin/order/save-update':
        require_once './business/admin/order.php';
        order_save_update();
        break;
    case 'admin/order/delete':
        require_once './business/admin/order.php';
        order_delete();
        break;
    case 'admin/order/deposit':
        require_once './business/admin/order.php';
        order_deposit();
        break;
    case 'admin/order/status':
        require_once './business/admin/order.php';
        order_status();
        break;
    case 'admin/order/detail':
        require_once './business/admin/order.php';
        order_detail();
        break;
        //-------------------------------------------MANAGE--CATEGORY-----------------------------------------------
    case 'admin/category/list':
        require_once './business/admin/category.php';
        category_list();
        break;
    case 'admin/category/add':
        require_once './business/admin/category.php';
        category_add();
        break;
    case 'admin/category/save-add':
        require_once './business/admin/category.php';
        category_save_add();
        break;
    case 'admin/category/update':
        require_once './business/admin/category.php';
        category_update();
        break;
    case 'admin/category/save-update':
        require_once './business/admin/category.php';
        category_save_update();
        break;
    case 'admin/category/delete':
        require_once './business/admin/category.php';
        category_delete();
        break;
    case 'admin/category/status':
        require_once './business/admin/category.php';
        category_status();
        //-------------------------------------MANAGE SLIDER---------------------------------------------
    case 'admin/slider/list':
        require_once './business/admin/slider.php';
        slider_list();
        break;
    case 'admin/slider/add':
        require_once './business/admin/slider.php';
        slider_add();
        break;
    case 'admin/slider/save-add':
        require_once './business/admin/slider.php';
        slider_save_add();
        break;
    case 'admin/slider/update':
        require_once './business/admin/slider.php';
        slider_update();
        break;
    case 'admin/slider/save-update':
        require_once './business/admin/slider.php';
        slider_save_update();
        break;
    case 'admin/slider/delete':
        require_once './business/admin/slider.php';
        slider_delete();
        break;
    case 'admin/slider/status':
        require_once './business/admin/slider.php';
        slider_status();
        break;
        //-------------------------------------MANAGE INFORMATION---------------------------------------------
    case 'admin/infor/list':
        require_once './business/admin/infor.php';
        infor_list();
        break;
    case 'admin/infor/add':
        require_once './business/admin/infor.php';
        infor_add();
        break;
    case 'admin/infor/save-add':
        require_once './business/admin/infor.php';
        infor_save_add();
        break;
    case 'admin/infor/update':
        require_once './business/admin/infor.php';
        infor_update();
        break;
    case 'admin/infor/save-update':
        require_once './business/admin/infor.php';
        infor_save_update();
        break;
    case 'admin/infor/delete':
        require_once './business/admin/infor.php';
        infor_delete();
        break;
    case 'admin/infor/status':
        require_once './business/admin/infor.php';
        infor_status();
        break;
        //-------------------------------------MANAGE INFORMATION---------------------------------------------
    case 'admin/comment/list':
        require_once './business/admin/comment.php';
        comment_list();
        break;
    case 'admin/comment/detail':
        require_once './business/admin/comment.php';
        comment_detail();
        break;
    case 'admin/comment/delete':
        require_once './business/admin/comment.php';
        comment_delete();
        break;
    case 'admin/comment/status':
        require_once './business/admin/comment.php';
        comment_status();
        break;
     //----------------------------------------MANAGE--admin------------------------------------------
     case 'admin/admin/list':
        require_once './business/admin/admin.php';
        admin_list();
        break;
    case 'admin/admin/add':
        require_once './business/admin/admin.php';
        admin_add();
        break;
    case 'admin/admin/save-add':
        require_once './business/admin/admin.php';
        admin_save_add();
        break;
    case 'admin/admin/update':
        require_once './business/admin/admin.php';
        admin_update();
        break;
    case 'admin/admin/save-update':
        require_once './business/admin/admin.php';
        admin_save_update();
        break;
    case 'admin/admin/delete':
        require_once './business/admin/admin.php';
        admin_delete();
        break;
    case 'admin/admin/status':
        require_once './business/admin/admin.php';
        admin_status();
        break;
    default:
        require_once './404.php';
        break;
}
