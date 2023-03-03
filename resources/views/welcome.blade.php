@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex flex-wrap flex-row mt-3">
            @foreach ($films as $film)
                <div class="d-flex flex-wrap flex-column align-items-center mt-5" style="width: 250px;">
                    <div>
                        @if ($film->poster)
                            <img src="{{ asset('storage/app/' . $film->poster) }}" class="rounded-3">
                        @else
                            <svg width="200" height="300" viewBox="0 0 200 300" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect width="200" height="300" rx="6" fill="#EAECEE" />
                                <path
                                    d="M37.1357 146V138.65H43.7437V146H42.7497V139.252L43.0017 139.518H37.8777L38.1297 139.252V146H37.1357ZM49.5933 146.07C48.8839 146.07 48.2446 145.911 47.6753 145.594C47.1153 145.267 46.6719 144.824 46.3453 144.264C46.0186 143.695 45.8553 143.046 45.8553 142.318C45.8553 141.581 46.0186 140.932 46.3453 140.372C46.6719 139.812 47.1153 139.373 47.6753 139.056C48.2353 138.739 48.8746 138.58 49.5933 138.58C50.3213 138.58 50.9653 138.739 51.5253 139.056C52.0946 139.373 52.5379 139.812 52.8553 140.372C53.1819 140.932 53.3453 141.581 53.3453 142.318C53.3453 143.046 53.1819 143.695 52.8553 144.264C52.5379 144.824 52.0946 145.267 51.5253 145.594C50.9559 145.911 50.3119 146.07 49.5933 146.07ZM49.5933 145.188C50.1253 145.188 50.5966 145.071 51.0073 144.838C51.4179 144.595 51.7399 144.259 51.9733 143.83C52.2159 143.391 52.3373 142.887 52.3373 142.318C52.3373 141.739 52.2159 141.235 51.9733 140.806C51.7399 140.377 51.4179 140.045 51.0073 139.812C50.5966 139.569 50.1299 139.448 49.6073 139.448C49.0846 139.448 48.6179 139.569 48.2073 139.812C47.7966 140.045 47.4699 140.377 47.2273 140.806C46.9846 141.235 46.8633 141.739 46.8633 142.318C46.8633 142.887 46.9846 143.391 47.2273 143.83C47.4699 144.259 47.7966 144.595 48.2073 144.838C48.6179 145.071 49.0799 145.188 49.5933 145.188ZM58.5497 146.07C57.8217 146.07 57.1683 145.911 56.5897 145.594C56.0203 145.267 55.5723 144.824 55.2457 144.264C54.919 143.695 54.7557 143.046 54.7557 142.318C54.7557 141.581 54.919 140.932 55.2457 140.372C55.5723 139.812 56.0203 139.373 56.5897 139.056C57.1683 138.739 57.8217 138.58 58.5497 138.58C59.175 138.58 59.7397 138.701 60.2437 138.944C60.7477 139.187 61.1443 139.551 61.4337 140.036L60.6917 140.54C60.4397 140.167 60.127 139.891 59.7537 139.714C59.3803 139.537 58.9743 139.448 58.5357 139.448C58.013 139.448 57.5417 139.569 57.1217 139.812C56.7017 140.045 56.3703 140.377 56.1277 140.806C55.885 141.235 55.7637 141.739 55.7637 142.318C55.7637 142.897 55.885 143.401 56.1277 143.83C56.3703 144.259 56.7017 144.595 57.1217 144.838C57.5417 145.071 58.013 145.188 58.5357 145.188C58.9743 145.188 59.3803 145.099 59.7537 144.922C60.127 144.745 60.4397 144.474 60.6917 144.11L61.4337 144.614C61.1443 145.09 60.7477 145.454 60.2437 145.706C59.7397 145.949 59.175 146.07 58.5497 146.07ZM64.6216 146V139.252L64.8736 139.518H61.8356V138.65H68.4016V139.518H65.3636L65.6156 139.252V146H64.6216ZM72.647 146.07C71.8817 146.07 71.2097 145.911 70.631 145.594C70.0523 145.267 69.5997 144.824 69.273 144.264C68.9463 143.695 68.783 143.046 68.783 142.318C68.783 141.59 68.937 140.946 69.245 140.386C69.5623 139.826 69.9917 139.387 70.533 139.07C71.0837 138.743 71.6997 138.58 72.381 138.58C73.0717 138.58 73.683 138.739 74.215 139.056C74.7563 139.364 75.181 139.803 75.489 140.372C75.797 140.932 75.951 141.581 75.951 142.318C75.951 142.365 75.9463 142.416 75.937 142.472C75.937 142.519 75.937 142.57 75.937 142.626H69.539V141.884H75.405L75.013 142.178C75.013 141.646 74.8963 141.175 74.663 140.764C74.439 140.344 74.131 140.017 73.739 139.784C73.347 139.551 72.8943 139.434 72.381 139.434C71.877 139.434 71.4243 139.551 71.023 139.784C70.6217 140.017 70.309 140.344 70.085 140.764C69.861 141.184 69.749 141.665 69.749 142.206V142.36C69.749 142.92 69.8703 143.415 70.113 143.844C70.365 144.264 70.7103 144.595 71.149 144.838C71.597 145.071 72.1057 145.188 72.675 145.188C73.123 145.188 73.5383 145.109 73.921 144.95C74.313 144.791 74.649 144.549 74.929 144.222L75.489 144.866C75.1623 145.258 74.7517 145.557 74.257 145.762C73.7717 145.967 73.235 146.07 72.647 146.07ZM81.9453 146.07C81.3106 146.07 80.7366 145.925 80.2233 145.636C79.71 145.337 79.2993 144.913 78.9913 144.362C78.6926 143.802 78.5433 143.121 78.5433 142.318C78.5433 141.515 78.6926 140.839 78.9913 140.288C79.29 139.728 79.696 139.303 80.2093 139.014C80.7226 138.725 81.3013 138.58 81.9453 138.58C82.6453 138.58 83.2706 138.739 83.8213 139.056C84.3813 139.364 84.82 139.803 85.1373 140.372C85.4546 140.932 85.6133 141.581 85.6133 142.318C85.6133 143.065 85.4546 143.718 85.1373 144.278C84.82 144.838 84.3813 145.277 83.8213 145.594C83.2706 145.911 82.6453 146.07 81.9453 146.07ZM78.1513 148.716V138.65H79.1033V140.862L79.0053 142.332L79.1453 143.816V148.716H78.1513ZM81.8753 145.188C82.398 145.188 82.8646 145.071 83.2753 144.838C83.686 144.595 84.0126 144.259 84.2553 143.83C84.498 143.391 84.6193 142.887 84.6193 142.318C84.6193 141.749 84.498 141.249 84.2553 140.82C84.0126 140.391 83.686 140.055 83.2753 139.812C82.8646 139.569 82.398 139.448 81.8753 139.448C81.3526 139.448 80.8813 139.569 80.4613 139.812C80.0506 140.055 79.724 140.391 79.4813 140.82C79.248 141.249 79.1313 141.749 79.1313 142.318C79.1313 142.887 79.248 143.391 79.4813 143.83C79.724 144.259 80.0506 144.595 80.4613 144.838C80.8813 145.071 81.3526 145.188 81.8753 145.188ZM91.413 146V138.65H94.661C95.4917 138.65 96.145 138.809 96.621 139.126C97.1064 139.443 97.349 139.91 97.349 140.526C97.349 141.123 97.1204 141.585 96.663 141.912C96.2057 142.229 95.6037 142.388 94.857 142.388L95.053 142.094C95.9304 142.094 96.5744 142.257 96.985 142.584C97.3957 142.911 97.601 143.382 97.601 143.998C97.601 144.633 97.3677 145.127 96.901 145.482C96.4437 145.827 95.7297 146 94.759 146H91.413ZM92.379 145.216H94.717C95.3424 145.216 95.8137 145.118 96.131 144.922C96.4577 144.717 96.621 144.39 96.621 143.942C96.621 143.494 96.4764 143.167 96.187 142.962C95.8977 142.757 95.4404 142.654 94.815 142.654H92.379V145.216ZM92.379 141.912H94.591C95.1604 141.912 95.5944 141.805 95.893 141.59C96.201 141.375 96.355 141.063 96.355 140.652C96.355 140.241 96.201 139.933 95.893 139.728C95.5944 139.523 95.1604 139.42 94.591 139.42H92.379V141.912ZM103.725 146.07C103.09 146.07 102.516 145.925 102.003 145.636C101.489 145.337 101.079 144.913 100.771 144.362C100.472 143.802 100.323 143.121 100.323 142.318C100.323 141.515 100.472 140.839 100.771 140.288C101.069 139.728 101.475 139.303 101.989 139.014C102.502 138.725 103.081 138.58 103.725 138.58C104.425 138.58 105.05 138.739 105.601 139.056C106.161 139.364 106.599 139.803 106.917 140.372C107.234 140.932 107.393 141.581 107.393 142.318C107.393 143.065 107.234 143.718 106.917 144.278C106.599 144.838 106.161 145.277 105.601 145.594C105.05 145.911 104.425 146.07 103.725 146.07ZM99.9306 148.716V138.65H100.883V140.862L100.785 142.332L100.925 143.816V148.716H99.9306ZM103.655 145.188C104.177 145.188 104.644 145.071 105.055 144.838C105.465 144.595 105.792 144.259 106.035 143.83C106.277 143.391 106.399 142.887 106.399 142.318C106.399 141.749 106.277 141.249 106.035 140.82C105.792 140.391 105.465 140.055 105.055 139.812C104.644 139.569 104.177 139.448 103.655 139.448C103.132 139.448 102.661 139.569 102.241 139.812C101.83 140.055 101.503 140.391 101.261 140.82C101.027 141.249 100.911 141.749 100.911 142.318C100.911 142.887 101.027 143.391 101.261 143.83C101.503 144.259 101.83 144.595 102.241 144.838C102.661 145.071 103.132 145.188 103.655 145.188ZM112.678 146.07C111.913 146.07 111.241 145.911 110.662 145.594C110.084 145.267 109.631 144.824 109.304 144.264C108.978 143.695 108.814 143.046 108.814 142.318C108.814 141.59 108.968 140.946 109.276 140.386C109.594 139.826 110.023 139.387 110.564 139.07C111.115 138.743 111.731 138.58 112.412 138.58C113.103 138.58 113.714 138.739 114.246 139.056C114.788 139.364 115.212 139.803 115.52 140.372C115.828 140.932 115.982 141.581 115.982 142.318C115.982 142.365 115.978 142.416 115.968 142.472C115.968 142.519 115.968 142.57 115.968 142.626H109.57V141.884H115.436L115.044 142.178C115.044 141.646 114.928 141.175 114.694 140.764C114.47 140.344 114.162 140.017 113.77 139.784C113.378 139.551 112.926 139.434 112.412 139.434C111.908 139.434 111.456 139.551 111.054 139.784C110.653 140.017 110.34 140.344 110.116 140.764C109.892 141.184 109.78 141.665 109.78 142.206V142.36C109.78 142.92 109.902 143.415 110.144 143.844C110.396 144.264 110.742 144.595 111.18 144.838C111.628 145.071 112.137 145.188 112.706 145.188C113.154 145.188 113.57 145.109 113.952 144.95C114.344 144.791 114.68 144.549 114.96 144.222L115.52 144.866C115.194 145.258 114.783 145.557 114.288 145.762C113.803 145.967 113.266 146.07 112.678 146.07ZM118.183 146V138.65H119.191L122.523 144.292H122.103L125.491 138.65H126.415V146H125.505V139.784L125.687 139.868L122.523 145.104H122.075L118.883 139.812L119.093 139.77V146H118.183ZM132.393 146.07C131.628 146.07 130.956 145.911 130.377 145.594C129.798 145.267 129.346 144.824 129.019 144.264C128.692 143.695 128.529 143.046 128.529 142.318C128.529 141.59 128.683 140.946 128.991 140.386C129.308 139.826 129.738 139.387 130.279 139.07C130.83 138.743 131.446 138.58 132.127 138.58C132.818 138.58 133.429 138.739 133.961 139.056C134.502 139.364 134.927 139.803 135.235 140.372C135.543 140.932 135.697 141.581 135.697 142.318C135.697 142.365 135.692 142.416 135.683 142.472C135.683 142.519 135.683 142.57 135.683 142.626H129.285V141.884H135.151L134.759 142.178C134.759 141.646 134.642 141.175 134.409 140.764C134.185 140.344 133.877 140.017 133.485 139.784C133.093 139.551 132.64 139.434 132.127 139.434C131.623 139.434 131.17 139.551 130.769 139.784C130.368 140.017 130.055 140.344 129.831 140.764C129.607 141.184 129.495 141.665 129.495 142.206V142.36C129.495 142.92 129.616 143.415 129.859 143.844C130.111 144.264 130.456 144.595 130.895 144.838C131.343 145.071 131.852 145.188 132.421 145.188C132.869 145.188 133.284 145.109 133.667 144.95C134.059 144.791 134.395 144.549 134.675 144.222L135.235 144.866C134.908 145.258 134.498 145.557 134.003 145.762C133.518 145.967 132.981 146.07 132.393 146.07ZM137.897 146V138.65H138.891V141.898H143.525V138.65H144.519V146H143.525V142.752H138.891V146H137.897ZM147.345 146V138.65H148.339V141.898H152.973V138.65H153.967V146H152.973V142.752H148.339V146H147.345ZM159.816 146.07C159.107 146.07 158.467 145.911 157.898 145.594C157.338 145.267 156.895 144.824 156.568 144.264C156.241 143.695 156.078 143.046 156.078 142.318C156.078 141.581 156.241 140.932 156.568 140.372C156.895 139.812 157.338 139.373 157.898 139.056C158.458 138.739 159.097 138.58 159.816 138.58C160.544 138.58 161.188 138.739 161.748 139.056C162.317 139.373 162.761 139.812 163.078 140.372C163.405 140.932 163.568 141.581 163.568 142.318C163.568 143.046 163.405 143.695 163.078 144.264C162.761 144.824 162.317 145.267 161.748 145.594C161.179 145.911 160.535 146.07 159.816 146.07ZM159.816 145.188C160.348 145.188 160.819 145.071 161.23 144.838C161.641 144.595 161.963 144.259 162.196 143.83C162.439 143.391 162.56 142.887 162.56 142.318C162.56 141.739 162.439 141.235 162.196 140.806C161.963 140.377 161.641 140.045 161.23 139.812C160.819 139.569 160.353 139.448 159.83 139.448C159.307 139.448 158.841 139.569 158.43 139.812C158.019 140.045 157.693 140.377 157.45 140.806C157.207 141.235 157.086 141.739 157.086 142.318C157.086 142.887 157.207 143.391 157.45 143.83C157.693 144.259 158.019 144.595 158.43 144.838C158.841 145.071 159.303 145.188 159.816 145.188ZM63.3403 163.07C62.631 163.07 61.9917 162.911 61.4223 162.594C60.8623 162.267 60.419 161.824 60.0923 161.264C59.7657 160.695 59.6023 160.046 59.6023 159.318C59.6023 158.581 59.7657 157.932 60.0923 157.372C60.419 156.812 60.8623 156.373 61.4223 156.056C61.9823 155.739 62.6217 155.58 63.3403 155.58C64.0683 155.58 64.7123 155.739 65.2723 156.056C65.8417 156.373 66.285 156.812 66.6023 157.372C66.929 157.932 67.0923 158.581 67.0923 159.318C67.0923 160.046 66.929 160.695 66.6023 161.264C66.285 161.824 65.8417 162.267 65.2723 162.594C64.703 162.911 64.059 163.07 63.3403 163.07ZM63.3403 162.188C63.8723 162.188 64.3437 162.071 64.7543 161.838C65.165 161.595 65.487 161.259 65.7203 160.83C65.963 160.391 66.0843 159.887 66.0843 159.318C66.0843 158.739 65.963 158.235 65.7203 157.806C65.487 157.377 65.165 157.045 64.7543 156.812C64.3437 156.569 63.877 156.448 63.3543 156.448C62.8317 156.448 62.365 156.569 61.9543 156.812C61.5437 157.045 61.217 157.377 60.9743 157.806C60.7317 158.235 60.6103 158.739 60.6103 159.318C60.6103 159.887 60.7317 160.391 60.9743 160.83C61.217 161.259 61.5437 161.595 61.9543 161.838C62.365 162.071 62.827 162.188 63.3403 162.188ZM70.3433 163V156.252L70.5953 156.518H67.5573V155.65H74.1233V156.518H71.0853L71.3373 156.252V163H70.3433ZM78.2987 163.07C77.5707 163.07 76.9174 162.911 76.3387 162.594C75.7694 162.267 75.3214 161.824 74.9947 161.264C74.668 160.695 74.5047 160.046 74.5047 159.318C74.5047 158.581 74.668 157.932 74.9947 157.372C75.3214 156.812 75.7694 156.373 76.3387 156.056C76.9174 155.739 77.5707 155.58 78.2987 155.58C78.924 155.58 79.4887 155.701 79.9927 155.944C80.4967 156.187 80.8934 156.551 81.1827 157.036L80.4407 157.54C80.1887 157.167 79.876 156.891 79.5027 156.714C79.1294 156.537 78.7234 156.448 78.2847 156.448C77.762 156.448 77.2907 156.569 76.8707 156.812C76.4507 157.045 76.1194 157.377 75.8767 157.806C75.634 158.235 75.5127 158.739 75.5127 159.318C75.5127 159.897 75.634 160.401 75.8767 160.83C76.1194 161.259 76.4507 161.595 76.8707 161.838C77.2907 162.071 77.762 162.188 78.2847 162.188C78.7234 162.188 79.1294 162.099 79.5027 161.922C79.876 161.745 80.1887 161.474 80.4407 161.11L81.1827 161.614C80.8934 162.09 80.4967 162.454 79.9927 162.706C79.4887 162.949 78.924 163.07 78.2987 163.07ZM83.124 165.786C82.7787 165.786 82.4473 165.73 82.13 165.618C81.822 165.506 81.556 165.338 81.332 165.114L81.794 164.372C81.9807 164.549 82.1813 164.685 82.396 164.778C82.62 164.881 82.8673 164.932 83.138 164.932C83.4647 164.932 83.7447 164.839 83.978 164.652C84.2207 164.475 84.4493 164.157 84.664 163.7L85.14 162.622L85.252 162.468L88.276 155.65H89.256L85.574 163.882C85.3687 164.358 85.14 164.736 84.888 165.016C84.6453 165.296 84.3793 165.492 84.09 165.604C83.8007 165.725 83.4787 165.786 83.124 165.786ZM85.084 163.21L81.696 155.65H82.732L85.728 162.398L85.084 163.21ZM92.2046 163V156.252L92.4566 156.518H89.4186V155.65H95.9846V156.518H92.9466L93.1986 156.252V163H92.2046ZM100.16 163.07C99.432 163.07 98.7787 162.911 98.2 162.594C97.6307 162.267 97.1827 161.824 96.856 161.264C96.5293 160.695 96.366 160.046 96.366 159.318C96.366 158.581 96.5293 157.932 96.856 157.372C97.1827 156.812 97.6307 156.373 98.2 156.056C98.7787 155.739 99.432 155.58 100.16 155.58C100.785 155.58 101.35 155.701 101.854 155.944C102.358 156.187 102.755 156.551 103.044 157.036L102.302 157.54C102.05 157.167 101.737 156.891 101.364 156.714C100.991 156.537 100.585 156.448 100.146 156.448C99.6233 156.448 99.152 156.569 98.732 156.812C98.312 157.045 97.9807 157.377 97.738 157.806C97.4953 158.235 97.374 158.739 97.374 159.318C97.374 159.897 97.4953 160.401 97.738 160.83C97.9807 161.259 98.312 161.595 98.732 161.838C99.152 162.071 99.6233 162.188 100.146 162.188C100.585 162.188 100.991 162.099 101.364 161.922C101.737 161.745 102.05 161.474 102.302 161.11L103.044 161.614C102.755 162.09 102.358 162.454 101.854 162.706C101.35 162.949 100.785 163.07 100.16 163.07ZM106.232 163V156.252L106.484 156.518H103.446V155.65H110.012V156.518H106.974L107.226 156.252V163H106.232ZM111.449 163V155.65H114.697C115.528 155.65 116.181 155.809 116.657 156.126C117.142 156.443 117.385 156.91 117.385 157.526C117.385 158.123 117.156 158.585 116.699 158.912C116.242 159.229 115.64 159.388 114.893 159.388L115.089 159.094C115.966 159.094 116.61 159.257 117.021 159.584C117.432 159.911 117.637 160.382 117.637 160.998C117.637 161.633 117.404 162.127 116.937 162.482C116.48 162.827 115.766 163 114.795 163H111.449ZM112.415 162.216H114.753C115.378 162.216 115.85 162.118 116.167 161.922C116.494 161.717 116.657 161.39 116.657 160.942C116.657 160.494 116.512 160.167 116.223 159.962C115.934 159.757 115.476 159.654 114.851 159.654H112.415V162.216ZM112.415 158.912H114.627C115.196 158.912 115.63 158.805 115.929 158.59C116.237 158.375 116.391 158.063 116.391 157.652C116.391 157.241 116.237 156.933 115.929 156.728C115.63 156.523 115.196 156.42 114.627 156.42H112.415V158.912ZM120.093 165.786C119.747 165.786 119.416 165.73 119.099 165.618C118.791 165.506 118.525 165.338 118.301 165.114L118.763 164.372C118.949 164.549 119.15 164.685 119.365 164.778C119.589 164.881 119.836 164.932 120.107 164.932C120.433 164.932 120.713 164.839 120.947 164.652C121.189 164.475 121.418 164.157 121.633 163.7L122.109 162.622L122.221 162.468L125.245 155.65H126.225L122.543 163.882C122.337 164.358 122.109 164.736 121.857 165.016C121.614 165.296 121.348 165.492 121.059 165.604C120.769 165.725 120.447 165.786 120.093 165.786ZM122.053 163.21L118.665 155.65H119.701L122.697 162.398L122.053 163.21ZM130.718 163.07C129.953 163.07 129.281 162.911 128.702 162.594C128.124 162.267 127.671 161.824 127.344 161.264C127.018 160.695 126.854 160.046 126.854 159.318C126.854 158.59 127.008 157.946 127.316 157.386C127.634 156.826 128.063 156.387 128.604 156.07C129.155 155.743 129.771 155.58 130.452 155.58C131.143 155.58 131.754 155.739 132.286 156.056C132.828 156.364 133.252 156.803 133.56 157.372C133.868 157.932 134.022 158.581 134.022 159.318C134.022 159.365 134.018 159.416 134.008 159.472C134.008 159.519 134.008 159.57 134.008 159.626H127.61V158.884H133.476L133.084 159.178C133.084 158.646 132.968 158.175 132.734 157.764C132.51 157.344 132.202 157.017 131.81 156.784C131.418 156.551 130.966 156.434 130.452 156.434C129.948 156.434 129.496 156.551 129.094 156.784C128.693 157.017 128.38 157.344 128.156 157.764C127.932 158.184 127.82 158.665 127.82 159.206V159.36C127.82 159.92 127.942 160.415 128.184 160.844C128.436 161.264 128.782 161.595 129.22 161.838C129.668 162.071 130.177 162.188 130.746 162.188C131.194 162.188 131.61 162.109 131.992 161.95C132.384 161.791 132.72 161.549 133 161.222L133.56 161.866C133.234 162.258 132.823 162.557 132.328 162.762C131.843 162.967 131.306 163.07 130.718 163.07ZM137.294 163V156.252L137.546 156.518H134.508V155.65H141.074V156.518H138.036L138.288 156.252V163H137.294Z"
                                    fill="#676767" />
                            </svg>
                        @endif
                    </div>
                    <h5 class="fw-bold text-center mt-3">{{ $film->title }}</h5>
                    <p class="text-center mb-1">
                        <span class="text-muted">{{ $film->age_limit }}
                            {{ date('h:i', strtotime($film->duration)) }}</span><br>
                    </p>
                    <p class="text-center">{{ $film->genres }}</p>
                    @role('admin')
                        <a href="{{ route('films.show', ['film' => $film->id]) }}"
                            class="btn btn-outline-primary px-5">Подробнее</a>
                    @else
                        <a href="{{ route('films.show', ['film' => $film->id]) }}"
                            class="btn btn-outline-primary px-5">Подробнее</a>
                    @endrole
                </div>
            @endforeach
        </div>
    </div>
@endsection
