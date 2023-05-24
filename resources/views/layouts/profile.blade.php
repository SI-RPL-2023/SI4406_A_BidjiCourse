@section('head-script')
    <!-- CircleProgress -->
    <script src="/js/jquery.circle-progress.min.js"></script>
@endsection
@php
    $avatar_src = is_null(auth()->user()->avatar) ? '/img/assets/' . (auth()->user()->gender == 'Perempuan' ? 'fe' : '') . 'male-avatar.jpg' : auth()->user()->avatar;
    $role = auth()->user()->is_admin ? 'Admin' : 'Student';
    $themes = ['default', 'cerulean', 'cosmo', 'flatly', 'journal', 'lumen', 'materia', 'minty', 'sandstone', 'simplex', 'sketchy', 'spacelab', 'united', 'yeti', 'zephyr'];
    $columnArray = ['email', 'full_name', 'avatar', 'born_date', 'number', 'gender'];
    $filledColumns = 0;
    foreach ($columnArray as $column) {
        if (!is_null(auth()->user()->$column)) {
            $filledColumns++;
        }
    }
    $profilePercentage = round(($filledColumns / count($columnArray)) * 100);
    $progressBarColor = $profilePercentage == 100 ? 'LimeGreen' : ($profilePercentage >= 80 ? 'Gold' : ($profilePercentage >= 60 ? 'DarkOrange' : 'Red'));
@endphp
<section class="section profile mt-4">
    <div class="row mb-3">
        <div class="col-xl-4">
            <div class="card mb-4 border shadow">
                <div class="card-body profile-card d-flex flex-column align-items-center justify-content-center pt-4 text-center">
                    <img class="rounded-circle img-fluid shadow" src="{{ $avatar_src }}" alt="Avatar" style="height: 150px">
                    <p class="h4 fw-bold mt-4">{{ auth()->user()->full_name }}</p>
                    <p>{{ $role }}</p>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="card border shadow" x-data>
                <div class="card-body pt-3">
                    <ul class="nav nav-pills nav-fill">
                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">
                                <i class="ti ti-list-details"></i> Overview
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit" x-ref="profileEditBtn">
                                <i class="ti ti-user-cog"></i> Edit Profile
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">
                                <i class="ti ti-settings"></i> Settings
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">
                                <i class="ti ti-key"></i> Change Password
                            </button>
                        </li>
                    </ul>
                    <hr>
                    <div class="tab-content pt-2">
                        <div class="tab-pane fade show active" id="profile-overview">
                            <h5 class="card-title fw-bold mb-3 mt-2">Profile Details</h5>
                            <style>
                                .circle-progress {
                                    width: 150px;
                                    height: auto;
                                }

                                .circle-progress-value {
                                    stroke-width: 6px;
                                    stroke: {{ $progressBarColor }};
                                    stroke-linecap: round;
                                }

                                .circle-progress-circle {
                                    stroke-width: 2px;
                                }
                            </style>
                            <div class="card text-bg-light mb-3 shadow-sm">
                                <div class="card-body m-3">
                                    <div id="profileCompletion"></div>
                                    <h4 class="fw-bold m-0 mt-3">Profile Completion</h4>
                                    @if ($profilePercentage == 100)
                                        <p class="mt-3">Anda telah mengisi semua profil dengan lengkap.</p>
                                    @else
                                        <p class="mt-3">Dengan melengkapi profil, Anda dapat menikmati layanan Bidji Course dengan maksimal.</p>
                                        <button class="btn btn-primary btn-sm" x-on:click="$refs.profileEditBtn.click()">
                                            <span class="fs-6 fw-bold">Lengkapi <i class="ti ti-chevrons-right"></i></span>
                                        </button>
                                    @endif
                                </div>
                            </div>
                            <div class="row-gap-3 grid gap-4">
                                <div class="row mb-3">
                                    <div class="col-lg-3 col-md-4 label">
                                        <i class="ti ti-user"></i> Full Name
                                    </div>
                                    <div class="col-lg-9 col-md-8 fw-bold">{{ auth()->user()->full_name }}</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-3 col-md-4 label">
                                        <i class="ti ti-shield"></i> Role
                                    </div>
                                    <div class="col-lg-9 col-md-8 fw-bold">{{ $role }}</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-3 col-md-4 label">
                                        <i class="ti ti-gender-bigender"></i> Gender
                                    </div>
                                    <div class="col-lg-9 col-md-8 fw-bold">{{ auth()->user()->gender }}</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-3 col-md-4 label">
                                        <i class="ti ti-calendar"></i> Born Date
                                    </div>
                                    <div class="col-lg-9 col-md-8 fw-bold {{ is_null(auth()->user()->born_date) ? 'fst-italic text-danger' : '' }}">{{ is_null(auth()->user()->born_date)? 'not_set': \Carbon\Carbon::parse(auth()->user()->born_date)->format('d F Y') .\Carbon\Carbon::parse(auth()->user()->born_date)->diff(now())->format(' • %y thn') }}</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-3 col-md-4 label">
                                        <i class="ti ti-phone"></i> Phone
                                    </div>
                                    <div class="col-lg-9 col-md-8 fw-bold {{ is_null(auth()->user()->number) ? 'fst-italic text-danger' : '' }}">{{ is_null(auth()->user()->number) ? 'not_set' : '(+62) ' . auth()->user()->number }}</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-3 col-md-4 label">
                                        <i class="ti ti-mail-opened"></i> Email
                                    </div>
                                    <div class="col-lg-9 col-md-8 fw-bold">{{ auth()->user()->email }}</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-3 col-md-4 label">
                                        <i class="ti ti-calendar-time"></i> Joined
                                    </div>
                                    <div class="col-lg-9 col-md-8 fw-bold">
                                        {{ \Carbon\Carbon::parse(auth()->user()->created_at)->format('d F Y') }} •
                                        {{ \Carbon\Carbon::parse(auth()->user()->created_at)->diff(now())->format('%y tahun, %m bulan, %d hari') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade pt-3" id="profile-edit">
                            <form method="POST" action="{{ route('profile.update.profiles') }}" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="row mb-3">
                                    <label class="col-md-4 col-lg-3 col-form-label" for="profileImage">Profile Image</label>
                                    <div class="col-md-8 col-lg-9">
                                        <div class="d-flex align-items-center gap-3">
                                            <img class="img-fluid rounded" id="avatar-preview" src="{{ $avatar_src }}" alt="Profile" style="height: 120px; object-fit: cover; aspect-ratio: 1/1;">
                                            <input class="d-none form-control" id="avatar-input" id="avatar" name="avatar" type="file" accept="image/*">
                                            <input id="remove-avatar" name="remove_avatar" type="hidden" value="0">
                                            <span>
                                                Gambar Profile Anda sebaiknya memiliki rasio 1:1 dan berukuran tidak lebih dari 2MB
                                            </span>
                                        </div>
                                        <div class="pt-2">
                                            <div class="btn btn-primary btn-sm" id="upload-btn">
                                                <i class="ti ti-upload"></i> Upload
                                            </div>
                                            <div class="btn btn-danger btn-sm {{ is_null(auth()->user()->avatar) ? 'disabled' : '' }}" id="remove-btn">
                                                <i class="ti ti-trash"></i> Remove
                                            </div>
                                            <div class="btn btn-success btn-sm" id="generate-btn" style="width: 120px">
                                                <i class="ti ti-refresh"></i> Generate
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-4 col-lg-3 col-form-label" for="full_name">Full Name</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input class="form-control" id="full_name" name="full_name" type="text" value="{{ auth()->user()->full_name }}" placeholder="Enter your full name...">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-4 col-lg-3 col-form-label" for="gender">Gender</label>
                                    <div class="col-md-8 col-lg-9">
                                        <select class="form-select" id="gender" name="gender">
                                            <option value="Laki-laki" {{ auth()->user()->gender == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                            <option value="Perempuan" {{ auth()->user()->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-4 col-lg-3 col-form-label" for="born_date">Born Date</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input class="form-control" id="born_date" name="born_date" type="date" value="{{ auth()->user()->born_date }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-4 col-lg-3 col-form-label" for="number">Phone</label>
                                    <div class="col-md-8 col-lg-9">
                                        <div class="input-group">
                                            <span class="input-group-text">+62</span>
                                            <input class="form-control" id="number" name="number" type="tel" value="{{ auth()->user()->number }}" placeholder="Enter your phone number...">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-primary" id="profile-save-btn" type="submit">Save Changes</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade pt-3" id="profile-settings">
                            <form method="POST" action="{{ route('profile.update.theme') }}">
                                @csrf
                                @method('PATCH')
                                <div class="row mb-3">
                                    <label class="col-md-4 col-lg-3 col-form-label" for="theme">Theme</label>
                                    <div class="col-md-8 col-lg-9">
                                        <select class="form-select" id="theme" name="theme" required>
                                            @foreach ($themes as $theme)
                                                <option value="{{ $theme }}" {{ auth()->user()->theme == $theme ? 'selected' : '' }}>{{ ucwords($theme) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-primary" type="submit">Save Changes</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade pt-3" id="profile-change-password">
                            <form method="POST" action="{{ route('profile.update.password') }}">
                                @csrf
                                @method('PATCH')
                                <div class="row mb-3" x-data="{ show: false }">
                                    <label class="col-md-4 col-lg-3 col-form-label" for="old_password">Current Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <div class="input-group">
                                            <input class="form-control" id="old_password" name="old_password" required x-bind:type="show ? 'text' : 'password'" placeholder="Enter your current password...">
                                            <button class="input-group-text text-secondary" type="button" x-on:click="show = !show">
                                                <i x-bind:class="show ? 'ti ti-eye-off fs-4' : 'ti ti-eye fs-4'"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3" x-data="{ show: false }">
                                    <label class="col-md-4 col-lg-3 col-form-label" for="new_password">New Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <div class="input-group">
                                            <input class="form-control" id="new_password" name="new_password" required x-bind:type="show ? 'text' : 'password'" placeholder="Enter your new password...">
                                            <button class="input-group-text text-secondary" type="button" x-on:click="show = !show">
                                                <i x-bind:class="show ? 'ti ti-eye-off fs-4' : 'ti ti-eye fs-4'"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3" x-data="{ show: false }">
                                    <label class="col-md-4 col-lg-3 col-form-label" for="password_confirmation">Password Confirmation</label>
                                    <div class="col-md-8 col-lg-9">
                                        <div class="input-group">
                                            <input class="form-control" id="password_confirmation" name="password_confirmation" required x-bind:type="show ? 'text' : 'password'" placeholder="Re-enter your new password...">
                                            <button class="input-group-text text-secondary" type="button" x-on:click="show = !show">
                                                <i x-bind:class="show ? 'ti ti-eye-off fs-4' : 'ti ti-eye fs-4'"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-primary" type="submit">Change Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@section('script')
    <script>
        $(document).ready(function() {
            // Profile completion progress bar
            $('#profileCompletion').circleProgress({
                max: 100,
                value: {{ $profilePercentage }},
                animationDuration: 2000,
                textFormat: 'percent',
            });

            // Avatar preview
            const avatarPreview = $('#avatar-preview');
            const avatarInput = $('#avatar-input');
            const removeAvatar = $('#remove-avatar');
            const uploadButton = $('#upload-btn');
            const removeButton = $('#remove-btn');
            const generateButton = $('#generate-btn');
            const profileSaveButton = $('#profile-save-btn');

            function imagePreview(files) {
                const file = files;
                const fileType = file["type"];
                const validImageTypes = ["image/jpg", "image/jpeg", "image/png", "image/gif", "image/jfif", "image/webp"];
                const avatarSrc = '{{ $avatar_src }}';
                const invalidTypeText =
                    `<div class="d-flex d-grid gap-2 mt-2 justify-content-center">
                        <span class="badge text-bg-primary">PNG</span>
                        <span class="badge text-bg-secondary">JPG</span>
                        <span class="badge text-bg-success">JPEG</span>
                        <span class="badge text-bg-danger">GIF</span>
                        <span class="badge text-bg-warning">JFIF</span>
                        <span class="badge text-bg-info">WEBP</span>
                    </div>`
                const invalidSizeText = '<span class="badge text-bg-dark">2MB</span>'
                if ($.inArray(fileType, validImageTypes) < 0) {
                    avatarPreview.attr('src', avatarSrc);
                    uploadButton.removeClass('disabled');
                    profileSaveButton.removeClass('disabled');
                    removeAvatar.val('0');
                    avatarInput.val('');
                    swalCustom.fire({
                        icon: 'warning',
                        html: 'Ekstensi file yang didukung: <br>' + invalidTypeText,
                    })
                } else if (file.size > 2097152) {
                    avatarPreview.attr('src', avatarSrc);
                    uploadButton.removeClass('disabled');
                    profileSaveButton.removeClass('disabled');
                    removeAvatar.val('0');
                    avatarInput.val('');
                    swalCustom.fire({
                        icon: 'warning',
                        html: 'Ukuran file maksimal ' + invalidSizeText,
                    });
                } else {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        removeAvatar.val('0');
                        removeButton.removeClass('disabled');
                        uploadButton.removeClass('disabled');
                        profileSaveButton.removeClass('disabled');
                        avatarPreview.fadeOut(function() {
                            avatarPreview.attr('src', e.target.result);
                            avatarPreview.fadeIn();
                        });
                    }
                    reader.readAsDataURL(file);
                }
            };
            uploadButton.click(function(e) {
                e.preventDefault();
                avatarInput.click();
            });
            avatarInput.change(function(e) {
                e.preventDefault();
                uploadButton.addClass('disabled');
                profileSaveButton.addClass('disabled');
                avatarPreview.attr('src', '/img/assets/loading.gif');
                imagePreview(this.files[0]);
            });
            generateButton.click(function() {
                const html = $(this).html();
                uploadButton.addClass('disabled');
                profileSaveButton.addClass('disabled');
                $(this).addClass('disabled');
                avatarPreview.attr('src', '/img/assets/loading.gif');
                $(this).html('<span class="spinner-border spinner-border-sm"></span>');
                const randomNumber = Math.floor(Math.random() * 10000);
                const imageUrl = `https://api.dicebear.com/6.x/avataaars/png?seed=${randomNumber}&backgroundColor=b6e3f4,c0aede,d1d4f9,ffdfbf,ffd5dc&backgroundType=gradientLinear&accessoriesProbability=25`;
                const timeoutPromise = new Promise((resolve, reject) => {
                    setTimeout(() => {
                        reject(new Error('Fetch timeout'));
                    }, 10000);
                });
                const fetchPromise = fetch(imageUrl).then(response => response.blob());
                Promise.race([fetchPromise, timeoutPromise])
                    .then(blob => {
                        function createFileList(file) {
                            const dt = new DataTransfer();
                            dt.items.add(file);
                            return dt.files;
                        };
                        const file = new File([blob], `${randomNumber}.png`, {
                            type: 'image/png'
                        });
                        const fileList = createFileList(file);
                        avatarPreview.fadeOut(function() {
                            avatarPreview.attr('src', imageUrl);
                            avatarPreview.fadeIn();
                        });
                        removeAvatar.val('0');
                        avatarInput.prop('files', fileList);
                        $(this).html(html);
                        removeButton.removeClass('disabled');
                        uploadButton.removeClass('disabled');
                        profileSaveButton.removeClass('disabled');
                        setTimeout(() => {
                            $(this).removeClass('disabled');
                        }, 1000);
                    })
                    .catch(error => {
                        console.log(error.message);
                        avatarPreview.attr('src', '{{ $avatar_src }}');
                        $(this).html(html);
                        $(this).removeClass('disabled');
                        uploadButton.removeClass('disabled');
                        profileSaveButton.removeClass('disabled');
                        swalCustom.fire({
                            icon: "error",
                            title: "Generate Failed",
                            html: `<p>Generate avatar gagal, silahkan coba beberapa lagi.</p><span class="text-danger">error: <strong>${error.message}</strong></span>`,
                        });
                    });
            });
            removeButton.click(function() {
                swalCustom.fire({
                    title: "Hapus Avatar",
                    html: "Apakah kamu yakin ingin menghapus avatarmu?",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonText: "Hapus",
                    cancelButtonText: "Cancel",
                }).then((result) => {
                    if (result.value) {
                        avatarInput.val('');
                        removeAvatar.val('1');
                        $(this).addClass('disabled');
                        avatarPreview.fadeOut(function() {
                            avatarPreview.attr('src', `{{ '/img/assets/' . (auth()->user()->gender == 'Perempuan' ? 'fe' : '') . 'male-avatar.jpg' }}`);
                            avatarPreview.fadeIn();
                        });
                    }
                });
            });
        });
    </script>
@endsection
