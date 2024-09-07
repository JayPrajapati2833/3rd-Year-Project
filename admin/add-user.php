<?php
include "navbar1.php";
?>
<div class="form-container">
    <div class="h-1">Add User</div>
    <div class="add-news form">
        <form action="" autocomplete="off">
            <div class="input">
                <label for="nam">Enter Name : </label>
                <input type="text" name="name" id="name" placeholder="Name">
            </div>
            <div class="input">
                <label for="mail">Enter Email : </label>
                <input type="email" name="email" id="email" placeholder="email@gmail.com">
            </div>
            <div class="input">
                <label for="mobil">Enter Mobile no : </label>
                <input type="tel" name="mobile" id="mobile" placeholder="1234567890">
            </div>
            <div class="input">
                <label for="usr">Enter Username : </label>
                <input type="text" name="user" id="user" placeholder="User@12345">
            </div>
            <div class="input">
                <label for="pass">Enter Password : </label>
                <input type="password" name="password" id="password">
            </div>
            <div class="input">
                <div class="submit">
                    <button type="submit" class="btn">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
include "navbar2.php";
?>