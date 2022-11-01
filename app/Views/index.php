<div class="wrapper">
    <h1 class="mainTitle">
        Create Short Links!
    </h1>
    <p class="subtitle">
        SYONE is a custom short link personalization tool that enables you to targe, engage, and drive more customers. Get started for free.
    </p>
    <div class="centeredBox">
        <div class="centeredBoxInner">
            <?= session()->getFlashdata('error') ?>
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
        <p class="boxSubtitle">
            Use it! its Free, Fast, Secure - Long Term Links
        </p>
    </div>
</div>