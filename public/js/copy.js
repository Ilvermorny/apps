let button = document.getElementById("copy");
let content = document.getElementById("bbcode");
alertify.set("notifier", "delay", 3);
alertify.set("notifier", "position", "top-center");

const handlePermission = () => {
    navigator.permissions.query({ name: "clipboard-write" }).then(result => {
        if (result.state == "granted" || result.state == "prompt") {
            /* write to the clipboard now */
        }
    });
};

const updateClipboard = newClip => {
    navigator.clipboard.writeText(newClip).then(
        () => {
            alertify.success("BBcode copiado al portapapeles");
        },
        () => {
            alertify.error("No pudimos acceder al portapapeles");
        }
    );
};

button.addEventListener("click", () => {
    handlePermission();
    updateClipboard(content.textContent);
});
