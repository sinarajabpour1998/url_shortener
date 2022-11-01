<div class="wrapper">
    <h1 class="mainTitle">
        Short Link Created!
    </h1>
    <p class="subtitle">
        SYONE is a custom short link personalization tool that enables you to targe, engage, and drive more customers. Get started for free.
    </p>
    <div class="centeredBox">
        <a href="<?php echo base_url('/') ?>">Back</a>
        <div class="centeredBoxInner">
            <form class="centeredBox__form"  action="" method="post">
                <div class="centeredBox__formInputPrependedWrapper">
                    <div class="centeredBox__formInputPrependedIconWrapper">
                        <img src="<?php echo base_url('/images/url.svg') ?>" class="centeredBox__formInputPrependedIcon"  alt="">
                    </div>
                    <input type="text" name="url" id="generated_url" placeholder="https://example.com" value="<?= esc($link) ?>" class="centeredBox__formInputPrependedInput" disabled>
                </div>
                <span style="text-align: center;" class="centeredBox__formSubmitInput" id="generate_url" onclick="copyAction()">Copy</span>
            </form>
        </div>
        <p class="boxSubtitle">
            Use it! its Free, Fast, Secure - Long Term Links
        </p>
    </div>
</div>
<script>
    function copyAction() {
        let generate_url = document.getElementById("generate_url");
        let generated_url = document.getElementById("generated_url");
        copyToClipboard(generated_url.value);
        generate_url.innerHTML = "Copied !";
    }

    function copyToClipboard(text) {
        if (window.clipboardData && window.clipboardData.setData) {
            // Internet Explorer-specific code path to prevent textarea being shown while dialog is visible.
            return window.clipboardData.setData("Text", text);

        }
        else if (document.queryCommandSupported && document.queryCommandSupported("copy")) {
            var textarea = document.createElement("textarea");
            textarea.textContent = text;
            textarea.style.position = "fixed";  // Prevent scrolling to bottom of page in Microsoft Edge.
            document.body.appendChild(textarea);
            textarea.select();
            try {
                return document.execCommand("copy");  // Security exception may be thrown by some browsers.
            }
            catch (ex) {
                console.warn("Copy to clipboard failed.", ex);
                return prompt("Copy to clipboard: Ctrl+C, Enter", text);
            }
            finally {
                document.body.removeChild(textarea);
            }
        }
    }
</script>