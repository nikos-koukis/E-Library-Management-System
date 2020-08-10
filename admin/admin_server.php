<?php

include "../includes/config.php";

// ---------------  code for inactive student in student table from admin ------------------
if(isset($_GET['inact_id']))
{
    $id=$_GET['inact_id'];
    $status=0;
    $query = "UPDATE students set status='$status'  WHERE id='$id'";
    $result = mysqli_query($db,$query);
    header("Refresh:0; url=students.php");

}

//------------------- code for active students in student table from admin ----------------
if(isset($_GET['act_id']))
{
    $id=$_GET['act_id'];
    $status=1;
    $query = "UPDATE students set status='$status'  WHERE id='$id'";
    $result = mysqli_query($db,$query);
    header("Refresh:0; url=students.php");

}

//------------------- code for add category from admin ----------------
$name_exists = '';

if (isset($_POST['add_category'])) {

    $category_name = mysqli_real_escape_string($db, $_POST['category_name']);

    $query="SELECT * FROM category WHERE category_name='$category_name'";
    $result=mysqli_query($db,$query);

    if (mysqli_num_rows($result) > 0) {
        $name_exists = "<p>Sorry... category already exists</p>";
    }

    if($_POST['exampleRadios'] == '1'){
        $status = 1;
    }

    if($_POST['exampleRadios'] == '0'){
        $status = 0;
    }

    if(mysqli_num_rows($result) == 0){

    $query2 = "INSERT INTO category (category_name, status) VALUES ('$category_name', '$status')";
    mysqli_query($db,$query2);
    
    // ------------ RESET AUTO_INCREMENT FOR BETTER VIEW--------------------------------------------
    $query3 = "SET @autoid :=0";
    $result3 = mysqli_query($db,$query3);
    
    $query4 = "UPDATE category set id = @autoid := (@autoid+1)"; 
    $result4 = mysqli_query($db,$query4);
    
    $query5 = "ALTER TABLE category AUTO_INCREMENT=1";
    $result5 = mysqli_query($db,$query5);

    header( "refresh:0.5;url=manage_category.php" );
    
    }
}

//------------------- code for delete categories from admin ----------------
if(isset($_GET['del_cat_id']))
{
    $id=$_GET['del_cat_id'];
    $query = "DELETE FROM category WHERE id='$id'";
    $result = mysqli_query($db,$query);

    // ------------ RESET AUTO_INCREMENT FOR BETTER VIEW--------------------------------------------
    $query2 = "SET @autoid :=0";
    $result2 = mysqli_query($db,$query2);
    
    $query3 = "UPDATE category set id = @autoid := (@autoid+1)"; 
    $result3 = mysqli_query($db,$query3);
    
    $query4 = "ALTER TABLE category AUTO_INCREMENT=1";
    $result4 = mysqli_query($db,$query4);

    header("Refresh:0; url=./manage_category.php");
}

//------------------- edit category  from admin ---------------

if(isset($_POST['edit_category'])){

    $category_name=$_POST['category_name'];
    $status=$_POST['status'];

    $edit_cat_id=intval($_GET['edit_cat_id']);

    $query = "UPDATE category set category_name = '$category_name', status='$status' WHERE id='$edit_cat_id'";
    $result = mysqli_query($db,$query);

    header('location:manage_category.php');
}


//------------------- code for add author from admin ----------------
$author_exists = '';

if (isset($_POST['add_author'])) {

    $author_name = mysqli_real_escape_string($db, $_POST['author_name']);

    $query="SELECT * FROM authors WHERE author_name='$author_name'";
    $result=mysqli_query($db,$query);

    if (mysqli_num_rows($result) > 0) {
        $author_exists = "<p>Sorry... author already exists</p>";
    }

    if(mysqli_num_rows($result) == 0){

    $query2 = "INSERT INTO authors (author_name) VALUES ('$author_name')";
    mysqli_query($db,$query2);
    
    // ------------ RESET AUTO_INCREMENT FOR BETTER VIEW--------------------------------------------
    $query3 = "SET @autoid :=0";
    $result3 = mysqli_query($db,$query3);
    
    $query4 = "UPDATE authors set id = @autoid := (@autoid+1)"; 
    $result4 = mysqli_query($db,$query4);
    
    $query5 = "ALTER TABLE authors AUTO_INCREMENT=1";
    $result5 = mysqli_query($db,$query5);

    header( "refresh:0.5;url=manage_authors.php" );
    
    }
}

//------------------- code for delete author from admin ----------------
if(isset($_GET['del_auth_id']))
{
    $id=$_GET['del_auth_id'];
    $query = "DELETE FROM authors WHERE id='$id'";
    $result = mysqli_query($db,$query);

    // ------------ RESET AUTO_INCREMENT FOR BETTER VIEW--------------------------------------------
    $query2 = "SET @autoid :=0";
    $result2 = mysqli_query($db,$query2);
    
    $query3 = "UPDATE authors set id = @autoid := (@autoid+1)"; 
    $result3 = mysqli_query($db,$query3);
    
    $query4 = "ALTER TABLE authors AUTO_INCREMENT=1";
    $result4 = mysqli_query($db,$query4);

    header("Refresh:0; url=./manage_authors.php");
}

//------------------- edit author from admin ---------------

if(isset($_POST['edit_author'])){

    $author_name=$_POST['author_name'];


    $edit_auth_id=intval($_GET['edit_auth_id']);

    $query = "UPDATE authors set author_name = '$author_name' WHERE id='$edit_auth_id'";
    $result = mysqli_query($db,$query);

    header('location:manage_authors.php');
}

//------------------- code for add book from admin ----------------
$book_exists = '' ;

if (isset($_POST['add_book'])) {

    $book_name = mysqli_real_escape_string($db, $_POST['book_name']);
    $category_name = $_POST['category_name'];
    $author_name = $_POST['author_name'];
    $isbn = mysqli_real_escape_string($db, $_POST['isbn']);
    $price = mysqli_real_escape_string($db, $_POST['price']);

    $query="SELECT * FROM books WHERE book_name='$book_name'";
    $result=mysqli_query($db,$query);

    if (mysqli_num_rows($result) > 0) {
        $book_exists = "<p>Sorry... book already exists</p>";
    }else{
    $query2 = "INSERT INTO books (book_name,category_id,author_id,isbn,price)
     VALUES ('$book_name','$category_name','$author_name','$isbn','$price')";
    mysqli_query($db,$query2);


    // ------------ RESET AUTO_INCREMENT FOR BETTER VIEW--------------------------------------------
    $query3 = "SET @autoid :=0";
    $result3 = mysqli_query($db,$query3);
    
    $query4 = "UPDATE books set id = @autoid := (@autoid+1)"; 
    $result4 = mysqli_query($db,$query4);
    
    $query5 = "ALTER TABLE books AUTO_INCREMENT=1";
    $result5 = mysqli_query($db,$query5);

    header("Refresh:0; url=./manage_books.php");
    }
}

//------------------- code for delete book from admin ----------------
if(isset($_GET['del_book_id']))
{
    $id=$_GET['del_book_id'];
    $query = "DELETE FROM books WHERE id='$id'";
    $result = mysqli_query($db,$query);

    // ------------ RESET AUTO_INCREMENT FOR BETTER VIEW--------------------------------------------
    $query2 = "SET @autoid :=0";
    $result2 = mysqli_query($db,$query2);
    
    $query3 = "UPDATE books set id = @autoid := (@autoid+1)"; 
    $result3 = mysqli_query($db,$query3);
    
    $query4 = "ALTER TABLE books AUTO_INCREMENT=1";
    $result4 = mysqli_query($db,$query4);

    header("Refresh:0; url=./manage_books.php");
}

//------------------- edit book from admin ---------------
if(isset($_POST['edit_book'])){
    
    $book_name=$_POST['book_name'];
    $category_name = $_POST['category_name'];
    $author_name = $_POST['author_name'];
    $isbn = $_POST['isbn'];
    $price = $_POST['price'];
    
    $edit_book_id=intval($_GET['edit_book_id']);

    $query = "UPDATE books SET book_name='$book_name', category_id='$category_name' ,author_id='$author_name',isbn='$isbn', price='$price'
    WHERE id='$edit_book_id'";
    $result = mysqli_query($db,$query);

    header('location:manage_books.php');

}

//------------------- change admin password ---------------

if(isset($_POST['change_admin_pass']))
{
    $current_password=sha1($_POST['current_password']);
    $new_password=sha1($_POST['new_password']);


    $id=$_GET['admin_id'];

    $query=mysqli_query($db,"SELECT password FROM admin_credits where password='$current_password' && id='$id'");
    $num=mysqli_fetch_array($query);

    if($num>0)  
    {
        $con=mysqli_query($db,"update admin_credits set password= '$new_password' where id='$id'");

    }


}



?>