window.addEventListener("load", function () {
    document.getElementById("button-add").addEventListener("click", function () {
        var field = document.createElement("input");
        field.setAttribute("type", "text");
        field.setAttribute("name", "id_buku[]");

        var label = document.createElement("label");
        label.setAttribute("for", "buku 2");
        label.textContent = 'Buku 2';

        document.getElementById("books").appendChild(label);
        document.getElementById("books").appendChild(field);

    });
});
