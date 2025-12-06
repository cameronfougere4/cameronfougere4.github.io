let items = JSON.parse(localStorage.getItem("items")) || [];
renderList();

function addItem() {
    const input = document.getElementById("newItem");
    const item_text = input.value.trim();
    if (item_text === "") {
        alert("Please enter a task!");
        return;
    }

    const newItem = {
        text: item_text,
        id: Date.now()
    };
    items.push(newItem);
    localStorage.setItem("items", JSON.stringify(items));

    renderItem(newItem.text, newItem.id);
    input.value = "";
}

function renderList() {
    items.forEach(item => renderItem(item.text, item.id));
}

function renderItem(text, id) {
    const ul = document.getElementById("todoList");
    const li = document.createElement("li");
    li.dataset.id = id;

    const spanText = document.createElement("span");
    spanText.textContent = text;
    li.appendChild(spanText);

    const trash = document.createElement("span");
    trash.classList.add("fas", "fa-trash");
    trash.style.marginLeft = "10px";
    trash.style.cursor = "pointer";
    trash.addEventListener("click", () => {
        li.remove();
        items = items.filter(x => x.id !== id);
        localStorage.setItem("items", JSON.stringify(items));
    });
    li.appendChild(trash);

    ul.appendChild(li);
}
