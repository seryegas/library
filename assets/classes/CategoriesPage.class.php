<?php

class CategoriesPage
{
    function GetCategoriesNamesFromDB($connection)
    {
        $query = "SELECT * FROM category";
        return mysqli_fetch_all(mysqli_query($connection, $query));
    }

    function GetCategoryIdByName($connection, $category_name)
    {
        $query = "SELECT category_id FROM category WHERE category_name = '$category_name'";
        return mysqli_fetch_all(mysqli_query($connection, $query));
    }
}