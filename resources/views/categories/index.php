<section id="banner">
    <div class="container">
        <h1>Categories</h1>
    </div>
</section>
 
<section id="categories">
    <div class="container">
        <ul class="list-group">
            <?php foreach($categories as $category) : ?>
                <li class="list-group-item">
                    <?= $category->name ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>