<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="theme-color" content="#bla"  />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Meals</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
        crossorigin="anonymous"
    />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/home.css'); ?>">
</head>
<?php if ($message != null): ?>
            <div class="alert alert-primary" role="alert">
                <?= $message ?>
            </div>
        <?php endif; ?>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="https://cdn.pixabay.com/photo/2022/12/31/06/52/apple-7688110_1280.png" alt="Logo" width="30" height="30" class="d-inline-block align-top">
            Meals
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <form action="/info" method="get">
                        <button type="submit" class="nav-link btn btn-link" name="inicio" value="inicio">Home</button>
                    </form>
                </li>
                <li class="nav-item active">
                    <form action="/new-product" method="get">
                        <button type="submit" class="nav-link btn btn-link" name="inicio" value="inicio">Add new one</button>
                    </form>
                </li>
                <li class="nav-item">
                    <form action="/update-info" method="get">
                        <button type="submit" class="nav-link btn btn-link" name="usuario" value="usuario">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-person" viewBox="0 0 16 16">
                                <path
                                    d="M8 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5zm3.5-2a3.5 3.5 0 0 1-3.5 3.5h-1A3.5 3.5 0 0 1 1 6.5a.5.5 0 0 1 1 0A2.5 2.5 0 0 0 5 9h1a2.5 2.5 0 0 0 2.5-2.5z"/>
                            </svg>
                            User
                        </button>
                    </form>
                </li>
                <li class="nav-item">
                    <form action="/close" method="post">
                        <button type="submit" class="nav-link btn btn-link" name="cerrar_sesion" value="cerrar_sesion">Log out</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <label for="filterStatus" style="color: #eee">Filter by Status:</label>
            <select id="filterStatus" class="form-control">
                <option value="">All</option>
                <option value="On">On</option>
                <option value="Off">Off</option>
            </select>
        </div>
        <div class="col-md-6">
            <div id="filterLocation">
                <?php foreach ($allFood as $food): ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4" id="foodContainer">
        <!-- Food items will be added here -->
    </div>
    <div class="d-flex justify-content-center mt-4">
        <nav aria-label="Page navigation">
            <ul class="pagination" id="pagination">
                <!-- Pagination buttons will be added here -->
            </ul>
        </nav>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"
integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
crossorigin="anonymous"></script>
<script>
    // Your food data
    var allFood = <?php echo json_encode($allFood); ?>;
    var filteredFood = allFood.slice(); // Copy allFood to filteredFood initially

    // Pagination settings
    var itemsPerPage = 16; // Number of items to show per page
    var currentPage = 1;

    function showFoodPage(page, foods) {
        var startIndex = (page - 1) * itemsPerPage;
        var endIndex = startIndex + itemsPerPage;
        var foodContainer = document.getElementById("foodContainer");
        foodContainer.innerHTML = "";

        for (var i = startIndex; i < endIndex && i < foods.length; i++) {
            var food = foods[i];

            // Create food item card and append to foodContainer
            var card = `
                <div class="mb-4 col d-flex justify-content-center">
                    <div class="mb-1 rounded shadow card bg-dark" style="width: 214px; height: 404px;">
                        <h5 class="pt-2 text-center card-title" style="color: #eee">${food.name}</h5>
                        <div class="mb-1 rounded shadow card bg-dark" style="width: 214px; height: auto;">
                            <img src=${food.image} class="card-img-top" alt="..." style="width: 213px; height: 200px;">
                        </div>
                        <div class="card-body">
                            <div class="gap-2 d-grid">
                                <div class="mb-4 form-outline">
                                    <p class="pt-2 text-center" style="color: #eee">Country: ${food.location}</p>
                                    <form method="get" action="/show-detail">
                                        <input type="hidden" name="food" value="${food.name}">
                                        <div class="pt-1 pb-1 mb-5 text-center">
                                        <button type="submit" class="custom-button btn btn-primary">Detail</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            foodContainer.innerHTML += card;
        }
    }

    function updatePagination() {
        var totalPages = Math.ceil(filteredFood.length / itemsPerPage);
        var pagination = document.getElementById("pagination");
        pagination.innerHTML = "";

        for (var i = 1; i <= totalPages; i++) {
            var li = document.createElement("li");
            li.classList.add("page-item");
            if (i === currentPage) {
                li.classList.add("active");
            }
            var link = document.createElement("a");
            link.classList.add("page-link");
            link.href = "#";
            link.textContent = i;
            link.addEventListener("click", function (event) {
                event.preventDefault();
                currentPage = parseInt(event.target.textContent);
                showFoodPage(currentPage, filteredFood);
                updatePagination();
            });
            li.appendChild(link);
            pagination.appendChild(li);
        }
    }

    // Event listener for status filter
    var filterStatus = document.getElementById("filterStatus");
    filterStatus.addEventListener("change", function () {
        applyFilters();
    });

    // Event listener for location filter
    var filterLocation = document.getElementById("filterLocation");
    filterLocation.addEventListener("change", function () {
        applyFilters();
    });

    // Function to apply filters
    function applyFilters() {
        var status = filterStatus.value;
        var location = filterLocation.value;

        filteredFood = allFood.filter(function (food) {
            if (status && food.status !== status) {
                return false;
            }
            if (location && food.location !== location) {
                return false;
            }
            return true;
        });

        currentPage = 1;
        showFoodPage(currentPage, filteredFood);
        updatePagination();
    }

    // Initial setup
    showFoodPage(currentPage, filteredFood);
    updatePagination();

</script>

</body>
</html>
