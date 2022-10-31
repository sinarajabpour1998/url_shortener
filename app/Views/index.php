<div class="wrapper">
    <div class="centeredBox">
        <div class="centeredBoxInner">
            <?= session()->getFlashdata('error') ?>
            <?= session()->getFlashdata('success') ?>
            <?php
            if (session()->getFlashdata('link')) {
                echo '<a href="/s/' . session()->getFlashdata('link') . '" target="_blank">Show</a>';
            }
            ?>
            <?= service('validation')->listErrors() ?>
            <form class="centeredBox__form"  action="/link/create" method="post">
                <div class="centeredBox__formInputPrependedWrapper">
                    <?= csrf_field() ?>
                    <div class="centeredBox__formInputPrependedIconWrapper">
                        <img src="./images/url.svg" class="centeredBox__formInputPrependedIcon"  alt="">
                    </div>
                    <input type="text" name="url" placeholder="https://example.com" class="centeredBox__formInputPrependedInput">
                </div>
                <input type="submit" value="Shorten" class="centeredBox__formSubmitInput" >
            </form>
        </div>
    </div>
</div>