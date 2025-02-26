# PHP Learning Resources

## Recommended Videos
Videos are a great way to learn the basics. This PHP Basics course from Laracasts is good: https://laracasts.com/series/php-for-beginners-2023-edition (some of the later videos may be locked - please don't feel you need to access the paid videos, there are lots of free resources to use instead)

There are a lot of good YouTube videos by 'Traversy Media', including this: https://www.youtube.com/watch?v=BUCiSSyIGGU

---

## Recommended Reading

### **Book Chapters**
📖 *Olsson, M (2021) PHP 8 Quick Scripting Reference: A Pocket Guide to PHP Web Scripting. A Press.*
Book chatpers - Olsson, M (2021) PHP 8 Quick Scripting Reference: A Pocket Guide to PHP Web Scripting. A Press. (start with chapters one to eight). 

This is a book that runs through the basics of PHP, and later works up to Object Oriented Programming. The first eight chapters focus on the basics of PHP, including: Using PHP (chapter 1); Variables (chapter 2); Operators (chapter 3); String (chapter 4); Arrays (chapter 5); Conditionals (Chapter 6); Loops (Chapter 7); and Functions (chapter 8). 
📌 **Find the book:** [Library Search](https://librarysearch.northumbria.ac.uk/primo-explore/search?vid=northumbria)  (Please search for this book on library website- it is available as an ebook).

Start with chapters 1 to 8, covering:
1. **Using PHP**
2. **Variables**
3. **Operators**
4. **Strings**
5. **Arrays**
6. **Conditionals**
7. **Loops**
8. **Functions**

---

## PHP and HTML Basics

### **Basic PHP in HTML**
```php
<!DOCTYPE html>
<html lang="en-gb">
<head>
  <title>KF6012</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        echo "<h1>Hello, World!</h1>";
    ?>
</body>
</html>
```

### **Variables and Strings**
```php
<?php
$name = "world";
echo "<h1>Hello, $name!</h1>";
?>
```

Using concatenation:
```php
<?php
$name = "world";
$greeting = "Hello, ";
$message = $greeting . $name;
echo "<h1>" . $message . "!</h1>";
?>
```

---

## **Heredoc** (Handling large text output)
```php
<?php 
$name = "world";
 
echo <<<EOT
<!DOCTYPE html>
<html lang="en-gb">
<head>
  <title>KF6012</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Hello, $name</h1>     
</body>
</html>
EOT;
?>
```

---

## **Include and Require**
```php
<?php
include 'webpagehead.php';
$name = "world";
echo "<h1>Hello, $name!</h1>";
include 'webpagefoot.php';
?>
```

Use **require** instead of **include** to throw an error if the file is missing.
```php
<?php
require 'includes/webpagehead.php';
require 'includes/webpagefoot.php';
?>
```

Use **include_once** and **require_once** to prevent multiple imports.

---

## **Functions**
### **Basic function definition and call**
```php
<?php
function greet() {
  return "Hello, World!";
}

echo "<h1>" . greet() . "</h1>";
?>
```

### **Function with parameters**
```php
<?php
function greet($greeting = "Hi", $name = "John") {
  return "$greeting, $name!";
}

echo greet("Hello");
?>
```

---

## **Arrays in PHP**
### **Indexed Arrays**
```php
<?php
$myArray = array("egg", "chips");
echo $myArray[0] . " and " . $myArray[1];
?>
```

### **Associative Arrays**
```php
<?php
$food = array("main" => "burger", "side" => "chips", "drink" => "water");
echo $food["main"];
?>
```

### **Nested Arrays**
```php
<?php
$menu = array(
  "meat" => array("main" => "chicken burger", "side" => "onion rings"),
  "vegetarian" => array("main" => "veggie burger", "side" => "salad")
);

echo $menu["meat"]["main"];
?>
```

---

## **Looping Through Arrays**
### **Foreach Loop**
```php
<?php
$myArray = array("this", "that", "other");
foreach ($myArray as $value) {
  echo "<p>$value</p>";
}
?>
```

### **Foreach for Associative Arrays**
```php
<?php
$myArray = array("building" => "CIS", "room" => "002", "type" => "computer lab");
foreach ($myArray as $key => $value) {
  echo "<p>$key: $value</p>";
}
?>
```

---

## **Ternary Operator**
### **Standard If-Else**
```php
<?php
$x = rand(0, 100);
$y = rand(0, 100);

if ($x > $y) {
  $message = "x wins!";
} else {
  $message = "y wins!";
}

echo $message;
?>
```

### **Using Ternary Operator**
```php
<?php
$message = ($x > $y) ? "x wins!" : "y wins!";
echo $message;
?>
```

---

## **Error Reporting in PHP**

### **Show Errors in Browser**
```php
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
```

### **Turn Off Errors**
```php
<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(0);
?>
```

### **Log Errors to a File**
```php
<?php
error_log("There was an error", 3, "logs/errors.txt");
?>
```

More on error reporting: [PHP Manual](https://www.php.net/manual/en/function.error-reporting.php)

---

## **Further Reading & Resources**
- [PHP.net Documentation](https://www.php.net/manual/en/)
- [Andy Carter - PHP Heredoc](https://andy-carter.com/blog/what-are-php-heredoc-nowdoc)

📌 **Happy Coding! 🚀**
