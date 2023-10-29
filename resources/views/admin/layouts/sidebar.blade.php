<div class="sidebar px-4 py-4 py-md-4 me-0">
    <div class="d-flex flex-column h-100">
        <a href="{{ route('admin.dashboard') }}" class="mb-0 brand-icon">
            <span class="logo-icon">
                <i class="bi bi-bag-check-fill fs-4"></i>
            </span>
            <span class="logo-text">Islamic Mahfil</span>
        </a>
        <!-- Menu: main ul -->
        <ul class="menu-list flex-grow-1 mt-3">
            <li><a class="m-link active" href="{{ route('admin.dashboard') }}"><i class="icofont-home fs-5"></i> <span>Dashboard</span></a></li>
            <li class="collapsed">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-speaker" href="#">
                <i class="icofont-sale-discount fs-5"></i> <span> Speakers</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse" id="menu-speaker">
                    <li><a class="ms-link" href="{{ route('speakers.index') }}">Speakers List</a></li>
                </ul>
            </li>

            <li class="collapsed">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-event" href="#">
                <i class="icofont-sale-discount fs-5"></i> <span> Events </span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse" id="menu-event">
                    <li><a class="ms-link" href="{{ route('speakers.index') }}">Events List</a></li>
                </ul>
            </li>

            <li class="collapsed">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-setting" href="#">
                <i class="icofont-gear-alt fs-5"></i> <span>Settings</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse" id="menu-setting">
                    <li><a class="ms-link" href="{{ route('income_category.index') }}"> Income Category</a></li>
                    <li><a class="ms-link" href="{{ route('expense_category.index') }}"> Expense Category</a></li>
                    <li><a class="ms-link" href="{{ route('designations.index') }}">Designation List</a></li>
                    <li><a class="ms-link" href="{{ route('occupations.index') }}">Occupation List</a></li>
                </ul>
            </li>
        </ul>
        <!-- Menu: menu collepce btn -->
        <button type="button" class="btn btn-link sidebar-mini-btn text-light">
            <span class="ms-2"><i class="icofont-bubble-right"></i></span>
        </button>
    </div>
</div>
