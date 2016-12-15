<div class="newsletter-block">
    <div class="newsletter-container">
        <input class="close-newsletter" type="button" value="x" onclick="closeNewsletter()">
        <p>register for our newsletter</p>
        <form method="post" action="http://localhost:8080/wordpress/?na=s" onsubmit="return newsletter_check(this)">
            <label class="pitch">email</label>
            <input class="pitch email-icon-white" type="email" name="ne">
            <label class="pitch">name</label>
            <input class="pitch name-icon-white" type="text" name="nn">
            <button class="btn-newsletter" type="submit">register</button>
        </form>
    </div>
</div>