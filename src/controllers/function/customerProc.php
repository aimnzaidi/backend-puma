<?php 
//FOR ADMIN FUCNYUINON
//get all admin 
function getAllAdmin($db) {

    $sql = 'Select * FROM admin '; 
    $stmt = $db->prepare ($sql); 
    $stmt ->execute(); 
    return $stmt->fetchAll(PDO::FETCH_ASSOC); 
} 

//get admin by id 
function getAdmin($db, $adminId) {

    $sql = 'Select a.adminName, a.password, a.email FROM admin a  ';
    $sql .= 'Where a.adminid = :id';
    $stmt = $db->prepare ($sql);
    $id = (int) $adminId;
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC); 

}

//add new admin 
function createAdmin($db, $form_data) { 
    
    $sql = 'Insert into admin (adminName, password, email)'; 
    $sql .= 'values (:adminName, :password, :email)';  
    $stmt = $db->prepare ($sql); 
    $stmt->bindParam(':adminName', $form_data['adminName']); 
    $stmt->bindParam(':password', $form_data['password']);   
    $stmt->bindParam(':email', ($form_data['email']));
    $stmt->execute(); 
    return $db->lastInsertID();
}


//delete admin by id 
function deleteAdmin($db,$adminId) { 

    $sql = ' Delete from admin where adminId = :id';
    $stmt = $db->prepare($sql);  
    $id = (int)$adminId; 
    $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
    $stmt->execute(); 
} 

//update admin by id 
function updateAdmin($db,$form_dat,$adminId) { 

    $sql = 'UPDATE admin SET adminName = :adminName , password = :password ,  email = :email'; 
    $sql .=' WHERE adminId = :id'; 
    $stmt = $db->prepare ($sql); 
    $id = (int)$adminId; 
    $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
    $stmt->bindParam(':adminName', $form_dat['adminName']); 
    $stmt->bindParam(':password', $form_dat['password']); 
    $stmt->bindParam(':email',($form_dat['email']));
    $stmt->execute(); 
}

//Customer
//get all Customer Details
function getAllcustomer($db) {

    
    $sql = 'Select * FROM customer '; 
    $stmt = $db->prepare ($sql); 
    $stmt ->execute(); 
    return $stmt->fetchAll(PDO::FETCH_ASSOC); 
} 

//get Customer Details by id 
function getCustomer($db, $customerId) {

    $sql = 'Select o.customerName, o.customerShoesName, o.orderDate, o.warrantyDate, o.price FROM customer o  ';
    $sql .= 'Where o.id = :id';
    $stmt = $db->prepare ($sql);
    $id = (int) $customerId;
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC); 

}

//add new Customer Details
function createCustomer($db, $form_data) { 
  
    $sql = 'Insert into customer ( customerName, customerShoesName, orderDate, warrantyDate, price)'; 
    $sql .= 'values (:customerName, :customerShoesName, :orderDate, :warrantyDate, :price)';  
    $stmt = $db->prepare ($sql);   
    $stmt->bindParam(':customerName', ($form_data['customerName']));
    $stmt->bindParam(':customerShoesName', ($form_data['customerShoesName']));
    $stmt->bindParam(':orderDate', ($form_data['orderDate']));
    $stmt->bindParam(':warrantyDate', ($form_data['warrantyDate']));
    $stmt->bindParam(':price', ($form_data['price']));
    $stmt->execute(); 
    return $db->lastInsertID();
}


//delete Customer Details by id 
function deleteCustomer($db,$customerId) { 

    $sql = ' Delete from customer where id = :id';
    $stmt = $db->prepare($sql);  
    $id = (int)$customerId; 
    $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
    $stmt->execute(); 
} 

//update Customer Details by id 
function updateCustomer($db,$form_data,$customerId) { 

    
    $sql = 'UPDATE customer SET customerName = :customerName , customerShoesName = :customerShoesName, orderDate = :orderDate , warrantyDate = :warrantyDate , price = :price'; 
    $sql .=' WHERE id = :id'; 
    $stmt = $db->prepare ($sql); 
    $id = (int)$customerId;  
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);  
    $stmt->bindParam(':customerName', ($form_data['customerName']));
    $stmt->bindParam(':customerShoesName', ($form_data['customerShoesName']));
    $stmt->bindParam(':orderDate', ($form_data['orderDate']));
    $stmt->bindParam(':warrantyDate', ($form_data['warrantyDate']));
    $stmt->bindParam(':price', ($form_data['price']));
    $stmt->execute(); 
}