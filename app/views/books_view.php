<link rel="stylesheet" href="app/css/header.css">
<link rel="stylesheet" href="app/css/books.css">
<link rel="stylesheet" href="app/css/footer.css">
<link rel="stylesheet" href="app/css/cards.css">

<?php include "app/templates/header_template.php"; ?>

<div class="banner">
    <h3>ALL BOOKS</h3>
    <h3>ALL BOOKS</h3>
    <h3>ALL BOOKS</h3>
    <h3>ALL BOOKS</h3>
    <h3>ALL BOOKS</h3>
</div>

<main>
    <div class="top">
        <!-- <div class="filter-results">
            <div class="amount">
                <h3 class="title">FILTER</h3>
                <p id="resulsts-count">0 results</p>
            </div>
        </div> -->
        <!-- <div class="tags">
            <button id="reset-all-btn">Reset all</button>
            <div class="tag-list">
                <div class="tag"> -->
        <!-- English
                    <button name="English_Tag" class="tag-btn">
                        X
                    </button> -->
        <!-- </div>
            </div>
        </div> -->
        <!-- <select name="sortSelect" id="sortSelect" value="1">
            <option value="year-asc">By Year ASC</option>
            <option value="year-desc">By Year DESC</option>
        </select> -->
    </div>
    <section class="cards">
        <aside>
            <button id="reset-all-btn">Reset all</button>
            <div id="authors-sort-section">
                <h2 class="sort-category-title">Authors</h2>
                <ol id="authors-sort-section-list">
                </ol>
                <button id="filter-btn">Filter</button>
            </div>
        </aside>
        <ul id="book-list">

        </ul>
    </section>
</main>

<?php include "app/templates/footer_template.php"; ?>

<script src="app/js/books.js"></script>