<?php
// MODEL section
$username = $_COOKIE['todo-username'] ?? '';
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My To-Do List</title>
<link rel="stylesheet" href="my_style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>
<body>

<?php include 'nav.php'; ?>

<main>
    <h1>
    <?php 
        if (!empty($username)) {
            echo htmlspecialchars($username) . "'s To-Do List!";
        } else {
            echo "My To-Do List";
        }
    ?>
</h1>

    <form onsubmit="event.preventDefault(); addItem();">
    <input type="text" id="new-item" placeholder="New task">
    <button type="submit">Add</button>
</form>

    
    <ul id="todo-list"></ul>

<script>
let items = JSON.parse(localStorage.getItem("items")) || [];

function renderList() {
    const ul = document.getElementById("todo-list");
    ul.innerHTML = ""; // Clear list
    items.forEach(item => {
        renderItem(item.text, item.id);
    });
}

function renderItem(text, id) {
    const ul = document.getElementById("todo-list");
    const li = document.createElement("li");
    li.dataset.id = id;

    // Create span for task text
    const textSpan = document.createElement("span");
    textSpan.textContent = text;
    li.appendChild(textSpan);

    // Create garbage can span
    const trashSpan = document.createElement("span");
    trashSpan.classList.add('fas', 'fa-trash');
    trashSpan.style.color = 'red';
    trashSpan.style.marginLeft = '10px';
    trashSpan.style.cursor = 'pointer';
    li.appendChild(trashSpan);

    // Click event to delete
    trashSpan.addEventListener("click", () => {
        items = items.filter(x => x.id !== id);
        localStorage.setItem("items", JSON.stringify(items));
        renderList();
    });

    ul.appendChild(li);
}

// Add new item
function addItem() {
    const input = document.getElementById("new-item");
    const itemText = input.value.trim();
    if (itemText === "") {
        alert("Please enter a task!");
        return;
    }

    const newItem = { text: itemText, id: Date.now() };
    items.push(newItem);
    localStorage.setItem("items", JSON.stringify(items));
    renderList();
    input.value = "";
}

// Initial render
renderList();
</script>
    
</main>

<script src="to-do.js"></script>
<?php include 'footer.php'; ?>
</body>
</html>
