let items = JSON.parse(localStorage.getItem("items")) || [];
renderList();  // Show saved items

function addItem(event) {
    event.preventDefault(); // Prevent form submission

    const input = document.getElementById("todo_input");
    const text = input.value.trim();

    if (!text) {
        alert("Please enter a task.");
        return false;
    }

    const newItem = { text: text, id: Date.now() };
    items.push(newItem);
    localStorage.setItem("items", JSON.stringify(items));

    renderItem(newItem.text, newItem.id);

    input.value = ""; // Clear input
    return false;
}

function renderList() {
    items.forEach(item => renderItem(item.text, item.id));
}

function renderItem(text, id) {
    const ul = document.getElementById("todo_list");

    const li = document.createElement("li");
    li.dataset.id = id;

    const spanText = document.createElement("span");
    spanText.textContent = text;
    li.appendChild(spanText);

    const trashSpan = document.createElement("span");
    trashSpan.classList.add("fas", "fa-trash");
    trashSpan.style.marginLeft = "10px";
    trashSpan.style.cursor = "pointer";

    trashSpan.addEventListener("click", () => {
        li.remove();
        items = items.filter(x => x.id !== id);
        localStorage.setItem("items", JSON.stringify(items));
    });

    li.appendChild(trashSpan);
    ul.appendChild(li);
}
