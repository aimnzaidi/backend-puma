<?php 

use Slim\Http\Request; //namespace 
use Slim\Http\Response; //namespace 

//include adminProc.php file 
include __DIR__ .'/function/customerProc.php';


//alow cors
$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});

$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});
//end


//FOR ADMIN
//read table admin 
$app->get('/admin', function (Request $request, Response $response, array $arg){

    return $this->response->withJson(array('data' => 'success'), 200); });  
 
// read all data from table admin 
$app->get('/alladmin',function (Request $request, Response $response,  array $arg) { 

    $data = getAllAdmin($this->db); 
    if (is_null($data)) { 

        return $this->response->withHeader('Access-Control-Allow-Origin', '*')->withJson(array('error' => 'no data'), 404); 
} 
    return $this->response->withJson(array('data' => $data), 200); }); 

//request table admin by condition (cust id) 
$app->get('/admin/[{id}]', function ($request, $response, $args){   
    $adminId = $args['id']; 
    if (!is_numeric($adminId)) { 

        return $this->response->withJson(array('error' => 'numeric paremeter required'), 500);  
} 
    $data = getAdmin($this->db, $adminId); 
    if (empty($data)) { 

        return $this->response->withJson(array('error' => 'no data'), 500); 
} 

return $this->response->withJson(array('data' => $data), 200);});

//post method admin
$app->post('/admin/add', function ($request, $response, $args) { 

    $form_data = $request->getParsedBody(); 
    $data = createAdmin($this->db, $form_data); 
    if (is_null($data)) {

        return $this->response->withJson(array('error' => 'add data fail'), 500);
    }
    return $this->response->withJson(array('add data' => 'success'), 200); 
    }  );


//delete row admin
$app->delete('/admin/del/[{id}]', function ($request, $response, $args){   
    $adminId = $args['id']; 
    
   if (!is_numeric($adminId)) { 

       return $this->response->withJson(array('error' => 'numeric paremeter required'), 422); } 
       $data = deleteAdmin($this->db,$adminId); 
       if (empty($data)) { 

           return $this->response->withJson(array($adminId=> 'is successfully deleted'), 202);}; }); 
 
   
//put table admin 
$app->put('/admin/put/[{id}]', function ($request, $response, $args){
    $adminId = $args['id']; 
    
    if (!is_numeric($adminId)) { 
        
        return $this->response->withJson(array('error' => 'numeric paremeter required'), 422); } 
        $form_dat=$request->getParsedBody(); 
        $data=updateAdmin($this->db,$form_dat,$adminId); if ($data <=0)
        return $this->response->withJson(array('data' => 'successfully updated'), 200); 
});


// FOR Customer Details

//read table customer
$app->get('/customer', function (Request $request, Response $response, array $arg){

    return $this->response->withJson(array('data' => 'success'), 200); });  
 
// read all data from table customer
$app->get('/allcustomer',function (Request $request, Response $response,  array $arg) { 

    $data = getAllcustomer($this->db); 
    if (is_null($data)) { 

        return $this->response->withHeader('Access-Control-Allow-Origin', '*')->withJson(array('error' => 'no data'), 404); 
} 
    return $this->response->withJson(array('data' => $data), 200); }); 

//request table customer  by condition (customer id) 
$app->get('/customer/[{id}]', function ($request, $response, $args){   
    $customerId = $args['id']; 
    if (!is_numeric($customerId)) { 

        return $this->response->withJson(array('error' => 'numeric paremeter required'), 500);  
} 
    $data = getCustomer($this->db, $customerId); 
    if (empty($data)) { 

        return $this->response->withJson(array('error' => 'no data'), 500); 
} 

return $this->response->withJson(array('data' => $data), 200);});

//post method customer details
$app->post('/customer/add', function ($request, $response, $args) { 

    $form_data = $request->getParsedBody(); 
    $data = createCustomer($this->db, $form_data); 
    if (is_null($data)) { 

        return $this->response->withHeader('Access-Control-Allow-Origin', '*')->withJson(array('error' => 'no data'), 404); 
} 
    return $this->response->withJson(array('data' => $data), 200); }); 


//delete row customer details
$app->delete('/customer/del/[{id}]', function ($request, $response, $args){   
    $customerId = $args['id']; 
    
   if (!is_numeric($customerId)) { 

       return $this->response->withJson(array('error' => 'numeric paremeter required'), 422); } 
       $data = deleteCustomer($this->db,$customerId); 
       if (empty($data)) { 

           return $this->response->withJson(array($customerId=> 'is successfully deleted'), 202);}; }); 
 

   
//put table customer 
$app->put('/customer/put/[{id}]', function ($request, $response, $args){
    $customerId = $args['id']; 
    
    if (!is_numeric($customerId)) { 
        
        return $this->response->withJson(array('error' => 'numeric paremeter required'), 422); } 
        $form_dat=$request->getParsedBody(); 
        $data=updateCustomer($this->db,$form_dat,$customerId); 
        if ($data <=0)
        return $this->response->withJson(array('data' => 'successfully updated'), 200); 
});
   