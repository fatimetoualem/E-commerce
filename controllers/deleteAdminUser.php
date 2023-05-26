<?php
use App\Model\AdminModel;

$idUser = htmlspecialchars($_GET['id']);

$adminModel = new AdminModel();
$deleteUser = $adminModel->deleteUserById($idUser);


header('location:' .constructUrl('/adminUser'));
exit;