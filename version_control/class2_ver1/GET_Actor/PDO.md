### **What is PDO in PHP?**
**PDO (PHP Data Objects)** is a **database abstraction layer** built into PHP. It allows PHP to interact with databases **securely** and **efficiently**. Unlike `mysqli`, PDO supports **multiple database types** (MySQL, SQLite, PostgreSQL, etc.), making it **more flexible**.

🚀 **PDO is NOT a framework**, but a **built-in PHP extension**.
- NOTE: **Always use `try-catch` blocks** for **safe error handling** in production apps.

| Feature | Description | Why It's Important |
|---------|-------------|---------------------|
| **1️⃣ Supports Multiple Databases** | Works with MySQL, SQLite, PostgreSQL, etc. | Makes switching databases easier |
| **2️⃣ Uses Prepared Statements** | Prevents SQL injection | Secure database interactions |
| **3️⃣ Provides Error Handling** | Uses try-catch blocks for exceptions | Helps debug issues properly |
| **4️⃣ Uses Transactions** | Ensures atomicity (rollback if failure) | Keeps data integrity |
| **5️⃣ Supports Object-Oriented & Procedural PHP** | Can be used flexibly | Fits modern PHP applications |

> ✔ **Security** → Prepared statements protect from SQL injection.  
✔ **Portability** → Works with MySQL, SQLite, PostgreSQL, etc.  
✔ **Error Handling** → Exception-based debugging prevents API crashes.  
✔ **Performance** → Optimized query execution with prepared statements.  
✔ **Scalability** → Supports transactions, complex queries, and caching.  
---


## **🚀 Complete Guide to Using PDO in PHP**
PDO (**PHP Data Objects**) is the recommended way to **connect to databases** in PHP because it's **secure, flexible, and prevents SQL injection**.

---

## **📌 1️⃣ PDO Basics: Connecting to a Database**
To use PDO, we first need to **establish a connection** to a database.

### **✅ Example: Connecting to a MySQL Database**
```php
<?php
try {
    // Create a new PDO connection
    $db = new PDO("mysql:host=localhost;dbname=my_database", "username", "password");

    // Set error mode to Exception for better debugging
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "✅ Connected successfully!";
} catch (PDOException $e) {
    echo "❌ Connection failed: " . $e->getMessage();
}
?>
```
### **🔍 Explanation**
✅ **`new PDO("mysql:host=localhost;dbname=my_database", "username", "password")`** → Connects to the MySQL database.  
✅ **`setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION)`** → Enables exception-based error handling.  
✅ **`catch (PDOException $e) { echo $e->getMessage(); }`** → Catches errors and prints them.

---

## **📌 2️⃣ Using `prepare()`, `execute()`, and `fetchAll()`**
Once connected, we need to **execute SQL queries** safely using **prepared statements**.

### **✅ Example: Fetch All Rows Securely**
```php
<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=my_database", "username", "password");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Use a Prepared Statement
    $stmt = $db->prepare("SELECT * FROM users");
    $stmt->execute();

    // Fetch all results as an associative array
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    print_r($users);
} catch (PDOException $e) {
    echo "❌ Query failed: " . $e->getMessage();
}
?>
```
### **🔍 Explanation**
✅ **`$stmt = $db->prepare("SELECT * FROM users")`** → Prepares the SQL query (prevents SQL injection).  
✅ **`$stmt->execute();`** → Executes the query safely.  
✅ **`$stmt->fetchAll(PDO::FETCH_ASSOC);`** → Fetches all rows as an **associative array**.

---

## **📌 3️⃣ Using `execute()` with Parameters (Prevents SQL Injection)**
We should **NEVER** insert user input directly into an SQL query. Instead, **use placeholders** (`?` or `:named_placeholder`).

### **✅ Example: Using Named Placeholders (`:name`)**
```php
<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=my_database", "username", "password");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Secure Query with a Named Placeholder
    $stmt = $db->prepare("SELECT * FROM users WHERE name = :name");
    $stmt->execute(["name" => "John Doe"]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch one row
    print_r($user);
} catch (PDOException $e) {
    echo "❌ Query failed: " . $e->getMessage();
}
?>
```
### **🔍 Explanation**
✅ **`$stmt = $db->prepare("SELECT * FROM users WHERE name = :name")`** → Uses `:name` instead of inserting directly (prevents SQL injection).  
✅ **`$stmt->execute(["name" => "John Doe"])`** → Passes the parameter securely.  
✅ **`$stmt->fetch(PDO::FETCH_ASSOC);`** → Fetches **only one** result as an associative array.

---

## **📌 4️⃣ Inserting Data into the Database**
Use `INSERT INTO` to add data to the database.

### **✅ Example: Insert Data Securely**
```php
<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=my_database", "username", "password");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Insert data safely
    $stmt = $db->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
    $stmt->execute([
        "name" => "Alice",
        "email" => "alice@example.com"
    ]);

    echo "✅ User inserted successfully!";
} catch (PDOException $e) {
    echo "❌ Insert failed: " . $e->getMessage();
}
?>
```
### **🔍 Explanation**
✅ Uses `:name` and `:email` to prevent **SQL injection**.  
✅ `execute([...])` binds **user input safely**.

---

## **📌 5️⃣ Updating and Deleting Data**
We can also use `UPDATE` and `DELETE` securely.

### **✅ Update a User's Email**
```php
$stmt = $db->prepare("UPDATE users SET email = :email WHERE name = :name");
$stmt->execute([
    "email" => "newemail@example.com",
    "name" => "Alice"
]);
```
✅ **Updates Alice's email securely.**

### **✅ Delete a User**
```php
$stmt = $db->prepare("DELETE FROM users WHERE name = :name");
$stmt->execute(["name" => "Alice"]);
```
✅ **Deletes Alice securely.**

---

## **📌 6️⃣ Using Transactions (Rollback on Failure)**
Transactions allow **batch operations**, and if something **fails**, we can **rollback** changes.

### **✅ Example: Using Transactions**
```php
try {
    $db->beginTransaction(); // Start Transaction

    $stmt = $db->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
    $stmt->execute(["name" => "Bob", "email" => "bob@example.com"]);

    $stmt = $db->prepare("UPDATE users SET email = 'updated@example.com' WHERE name = 'Bob'");
    $stmt->execute();

    $db->commit(); // Commit the transaction

    echo "✅ Transaction successful!";
} catch (PDOException $e) {
    $db->rollBack(); // Rollback if any error occurs
    echo "❌ Transaction failed: " . $e->getMessage();
}
```
✅ **Ensures data consistency** → If one query fails, **everything is rolled back**.

---

## **📌 7️⃣ PDO Fetch Modes**
| **Mode** | **Description** | **Example** |
|----------|----------------|-------------|
| `PDO::FETCH_ASSOC` | Returns an associative array (`$row['column']`) | `fetch(PDO::FETCH_ASSOC);` |
| `PDO::FETCH_OBJ` | Returns an object (`$row->column`) | `fetch(PDO::FETCH_OBJ);` |
| `PDO::FETCH_NUM` | Returns an indexed array (`$row[0]`) | `fetch(PDO::FETCH_NUM);` |

✅ Example:
```php
$result = $stmt->fetch(PDO::FETCH_ASSOC); // Array format
$result = $stmt->fetch(PDO::FETCH_OBJ);   // Object format
```

---

## **📌 8️⃣ Handling Errors with `getMessage()`**
We use `getMessage()` to **retrieve error details**.
```php
catch (PDOException $e) {
    echo "❌ Error: " . $e->getMessage();
}
```
✅ Helps **debug issues properly**.

---

## **🚀 Final Summary**
| **Concept** | **Example** |
|------------|------------|
| **Connect to DB** | `$db = new PDO(...);` |
| **Prepare Query** | `$stmt = $db->prepare("SELECT ...");` |
| **Execute Query** | `$stmt->execute([...]);` |
| **Fetch Data** | `$stmt->fetchAll(PDO::FETCH_ASSOC);` |
| **Insert Data** | `INSERT INTO users VALUES (...);` |
| **Update Data** | `UPDATE users SET ... WHERE ...;` |
| **Delete Data** | `DELETE FROM users WHERE ...;` |
| **Transactions** | `$db->beginTransaction();` & `$db->commit();` |
| **Handle Errors** | `catch (PDOException $e) { echo $e->getMessage(); }` |

---

### **🚀 Next Steps**
💡 Try modifying the database schema.  
💡 Implement **pagination** with `LIMIT` and `OFFSET`.  
💡 Use **JOIN queries** with PDO.  

Let me know if you need more details! 🚀🔥

---

### **3️⃣ Fetching Data (Different Fetch Modes)**
```php
$stmt = $db->query("SELECT * FROM actor");

// Fetch as Associative Array
$actors = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch as Object
$actors = $stmt->fetchAll(PDO::FETCH_OBJ);

// Fetch Single Row
$actor = $stmt->fetch(PDO::FETCH_ASSOC);
```
✅ `PDO::FETCH_ASSOC` → Returns data as an **associative array (`$row['column']`)**  
✅ `PDO::FETCH_OBJ` → Returns data as an **object (`$row->column`)**  
✅ `fetch()` → Fetches **one row**, `fetchAll()` → Fetches **all rows**  

---

### **4️⃣ Handling Errors Gracefully (Advanced Debugging)**
```php
try {
    $stmt = $db->query("SELECT * FROM invalid_table"); // Intentional error
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["error" => "Database Query Error: " . $e->getMessage()]);
    exit;
}
```
✅ Triggers a `500 Internal Server Error` if the query fails.  
✅ **Returns JSON error instead of crashing the API.**  

---

### **5️⃣ Using Transactions (Rollback if Something Fails)**
```php
try {
    $db->beginTransaction(); // Start Transaction

    $db->exec("INSERT INTO actor (first_name, last_name) VALUES ('John', 'Doe')");
    $db->exec("UPDATE actor SET last_name = 'Smith' WHERE first_name = 'John'");

    $db->commit(); // Commit Changes
} catch (PDOException $e) {
    $db->rollBack(); // Rollback if any error occurs
    echo "Transaction failed: " . $e->getMessage();
}
```
✅ Ensures **both INSERT and UPDATE succeed together**.  
✅ If **one query fails**, `rollBack()` **undoes changes**.  
