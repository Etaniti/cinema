@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex flex-wrap flex-column offset-2" style="width: 70%;">
            <div class="d-flex flex-wrap flex-row justify-content-evenly align-items-start mt-5">
                <div>
                    @if ($film->poster)
                        <img src="{{ $film->getImageLink() }}" class="img-fluid rounded-3"
                            style="width: 200px; height: 300px;">
                    @else
                        <svg width="300" height="450" viewBox="0 0 300 450" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect width="300" height="450" rx="6" fill="#EAECEE" />
                            <path
                                d="M59.6938 219V208.5H69.1338V219H67.7138V209.36L68.0738 209.74H60.7538L61.1138 209.36V219H59.6938ZM77.4904 219.1C76.4771 219.1 75.5637 218.873 74.7504 218.42C73.9504 217.953 73.3171 217.32 72.8504 216.52C72.3837 215.707 72.1504 214.78 72.1504 213.74C72.1504 212.687 72.3837 211.76 72.8504 210.96C73.3171 210.16 73.9504 209.533 74.7504 209.08C75.5504 208.627 76.4637 208.4 77.4904 208.4C78.5304 208.4 79.4504 208.627 80.2504 209.08C81.0637 209.533 81.6971 210.16 82.1504 210.96C82.6171 211.76 82.8504 212.687 82.8504 213.74C82.8504 214.78 82.6171 215.707 82.1504 216.52C81.6971 217.32 81.0637 217.953 80.2504 218.42C79.4371 218.873 78.5171 219.1 77.4904 219.1ZM77.4904 217.84C78.2504 217.84 78.9237 217.673 79.5104 217.34C80.0971 216.993 80.5571 216.513 80.8904 215.9C81.2371 215.273 81.4104 214.553 81.4104 213.74C81.4104 212.913 81.2371 212.193 80.8904 211.58C80.5571 210.967 80.0971 210.493 79.5104 210.16C78.9237 209.813 78.2571 209.64 77.5104 209.64C76.7637 209.64 76.0971 209.813 75.5104 210.16C74.9237 210.493 74.4571 210.967 74.1104 211.58C73.7637 212.193 73.5904 212.913 73.5904 213.74C73.5904 214.553 73.7637 215.273 74.1104 215.9C74.4571 216.513 74.9237 216.993 75.5104 217.34C76.0971 217.673 76.7571 217.84 77.4904 217.84ZM90.2852 219.1C89.2452 219.1 88.3119 218.873 87.4852 218.42C86.6719 217.953 86.0319 217.32 85.5652 216.52C85.0986 215.707 84.8652 214.78 84.8652 213.74C84.8652 212.687 85.0986 211.76 85.5652 210.96C86.0319 210.16 86.6719 209.533 87.4852 209.08C88.3119 208.627 89.2452 208.4 90.2852 208.4C91.1786 208.4 91.9852 208.573 92.7052 208.92C93.4252 209.267 93.9919 209.787 94.4052 210.48L93.3452 211.2C92.9852 210.667 92.5386 210.273 92.0052 210.02C91.4719 209.767 90.8919 209.64 90.2652 209.64C89.5186 209.64 88.8452 209.813 88.2452 210.16C87.6452 210.493 87.1719 210.967 86.8252 211.58C86.4786 212.193 86.3052 212.913 86.3052 213.74C86.3052 214.567 86.4786 215.287 86.8252 215.9C87.1719 216.513 87.6452 216.993 88.2452 217.34C88.8452 217.673 89.5186 217.84 90.2652 217.84C90.8919 217.84 91.4719 217.713 92.0052 217.46C92.5386 217.207 92.9852 216.82 93.3452 216.3L94.4052 217.02C93.9919 217.7 93.4252 218.22 92.7052 218.58C91.9852 218.927 91.1786 219.1 90.2852 219.1ZM98.9595 219V209.36L99.3195 209.74H94.9795V208.5H104.359V209.74H100.019L100.379 209.36V219H98.9595ZM110.424 219.1C109.331 219.1 108.371 218.873 107.544 218.42C106.718 217.953 106.071 217.32 105.604 216.52C105.138 215.707 104.904 214.78 104.904 213.74C104.904 212.7 105.124 211.78 105.564 210.98C106.018 210.18 106.631 209.553 107.404 209.1C108.191 208.633 109.071 208.4 110.044 208.4C111.031 208.4 111.904 208.627 112.664 209.08C113.438 209.52 114.044 210.147 114.484 210.96C114.924 211.76 115.144 212.687 115.144 213.74C115.144 213.807 115.138 213.88 115.124 213.96C115.124 214.027 115.124 214.1 115.124 214.18H105.984V213.12H114.364L113.804 213.54C113.804 212.78 113.638 212.107 113.304 211.52C112.984 210.92 112.544 210.453 111.984 210.12C111.424 209.787 110.778 209.62 110.044 209.62C109.324 209.62 108.678 209.787 108.104 210.12C107.531 210.453 107.084 210.92 106.764 211.52C106.444 212.12 106.284 212.807 106.284 213.58V213.8C106.284 214.6 106.458 215.307 106.804 215.92C107.164 216.52 107.658 216.993 108.284 217.34C108.924 217.673 109.651 217.84 110.464 217.84C111.104 217.84 111.698 217.727 112.244 217.5C112.804 217.273 113.284 216.927 113.684 216.46L114.484 217.38C114.018 217.94 113.431 218.367 112.724 218.66C112.031 218.953 111.264 219.1 110.424 219.1ZM123.708 219.1C122.801 219.1 121.981 218.893 121.248 218.48C120.514 218.053 119.928 217.447 119.488 216.66C119.061 215.86 118.848 214.887 118.848 213.74C118.848 212.593 119.061 211.627 119.488 210.84C119.914 210.04 120.494 209.433 121.228 209.02C121.961 208.607 122.788 208.4 123.708 208.4C124.708 208.4 125.601 208.627 126.388 209.08C127.188 209.52 127.814 210.147 128.268 210.96C128.721 211.76 128.948 212.687 128.948 213.74C128.948 214.807 128.721 215.74 128.268 216.54C127.814 217.34 127.188 217.967 126.388 218.42C125.601 218.873 124.708 219.1 123.708 219.1ZM118.288 222.88V208.5H119.648V211.66L119.508 213.76L119.708 215.88V222.88H118.288ZM123.608 217.84C124.354 217.84 125.021 217.673 125.608 217.34C126.194 216.993 126.661 216.513 127.008 215.9C127.354 215.273 127.528 214.553 127.528 213.74C127.528 212.927 127.354 212.213 127.008 211.6C126.661 210.987 126.194 210.507 125.608 210.16C125.021 209.813 124.354 209.64 123.608 209.64C122.861 209.64 122.188 209.813 121.588 210.16C121.001 210.507 120.534 210.987 120.188 211.6C119.854 212.213 119.688 212.927 119.688 213.74C119.688 214.553 119.854 215.273 120.188 215.9C120.534 216.513 121.001 216.993 121.588 217.34C122.188 217.673 122.861 217.84 123.608 217.84ZM137.233 219V208.5H141.873C143.06 208.5 143.993 208.727 144.673 209.18C145.366 209.633 145.713 210.3 145.713 211.18C145.713 212.033 145.386 212.693 144.733 213.16C144.08 213.613 143.22 213.84 142.153 213.84L142.433 213.42C143.686 213.42 144.606 213.653 145.193 214.12C145.78 214.587 146.073 215.26 146.073 216.14C146.073 217.047 145.74 217.753 145.073 218.26C144.42 218.753 143.4 219 142.013 219H137.233ZM138.613 217.88H141.953C142.846 217.88 143.52 217.74 143.973 217.46C144.44 217.167 144.673 216.7 144.673 216.06C144.673 215.42 144.466 214.953 144.053 214.66C143.64 214.367 142.986 214.22 142.093 214.22H138.613V217.88ZM138.613 213.16H141.773C142.586 213.16 143.206 213.007 143.633 212.7C144.073 212.393 144.293 211.947 144.293 211.36C144.293 210.773 144.073 210.333 143.633 210.04C143.206 209.747 142.586 209.6 141.773 209.6H138.613V213.16ZM154.821 219.1C153.914 219.1 153.094 218.893 152.361 218.48C151.628 218.053 151.041 217.447 150.601 216.66C150.174 215.86 149.961 214.887 149.961 213.74C149.961 212.593 150.174 211.627 150.601 210.84C151.028 210.04 151.608 209.433 152.341 209.02C153.074 208.607 153.901 208.4 154.821 208.4C155.821 208.4 156.714 208.627 157.501 209.08C158.301 209.52 158.928 210.147 159.381 210.96C159.834 211.76 160.061 212.687 160.061 213.74C160.061 214.807 159.834 215.74 159.381 216.54C158.928 217.34 158.301 217.967 157.501 218.42C156.714 218.873 155.821 219.1 154.821 219.1ZM149.401 222.88V208.5H150.761V211.66L150.621 213.76L150.821 215.88V222.88H149.401ZM154.721 217.84C155.468 217.84 156.134 217.673 156.721 217.34C157.308 216.993 157.774 216.513 158.121 215.9C158.468 215.273 158.641 214.553 158.641 213.74C158.641 212.927 158.468 212.213 158.121 211.6C157.774 210.987 157.308 210.507 156.721 210.16C156.134 209.813 155.468 209.64 154.721 209.64C153.974 209.64 153.301 209.813 152.701 210.16C152.114 210.507 151.648 210.987 151.301 211.6C150.968 212.213 150.801 212.927 150.801 213.74C150.801 214.553 150.968 215.273 151.301 215.9C151.648 216.513 152.114 216.993 152.701 217.34C153.301 217.673 153.974 217.84 154.721 217.84ZM167.612 219.1C166.518 219.1 165.558 218.873 164.732 218.42C163.905 217.953 163.258 217.32 162.792 216.52C162.325 215.707 162.092 214.78 162.092 213.74C162.092 212.7 162.312 211.78 162.752 210.98C163.205 210.18 163.818 209.553 164.592 209.1C165.378 208.633 166.258 208.4 167.232 208.4C168.218 208.4 169.092 208.627 169.852 209.08C170.625 209.52 171.232 210.147 171.672 210.96C172.112 211.76 172.332 212.687 172.332 213.74C172.332 213.807 172.325 213.88 172.312 213.96C172.312 214.027 172.312 214.1 172.312 214.18H163.172V213.12H171.552L170.992 213.54C170.992 212.78 170.825 212.107 170.492 211.52C170.172 210.92 169.732 210.453 169.172 210.12C168.612 209.787 167.965 209.62 167.232 209.62C166.512 209.62 165.865 209.787 165.292 210.12C164.718 210.453 164.272 210.92 163.952 211.52C163.632 212.12 163.472 212.807 163.472 213.58V213.8C163.472 214.6 163.645 215.307 163.992 215.92C164.352 216.52 164.845 216.993 165.472 217.34C166.112 217.673 166.838 217.84 167.652 217.84C168.292 217.84 168.885 217.727 169.432 217.5C169.992 217.273 170.472 216.927 170.872 216.46L171.672 217.38C171.205 217.94 170.618 218.367 169.912 218.66C169.218 218.953 168.452 219.1 167.612 219.1ZM175.475 219V208.5H176.915L181.675 216.56H181.075L185.915 208.5H187.235V219H185.935V210.12L186.195 210.24L181.675 217.72H181.035L176.475 210.16L176.775 210.1V219H175.475ZM195.776 219.1C194.683 219.1 193.723 218.873 192.896 218.42C192.069 217.953 191.423 217.32 190.956 216.52C190.489 215.707 190.256 214.78 190.256 213.74C190.256 212.7 190.476 211.78 190.916 210.98C191.369 210.18 191.983 209.553 192.756 209.1C193.543 208.633 194.423 208.4 195.396 208.4C196.383 208.4 197.256 208.627 198.016 209.08C198.789 209.52 199.396 210.147 199.836 210.96C200.276 211.76 200.496 212.687 200.496 213.74C200.496 213.807 200.489 213.88 200.476 213.96C200.476 214.027 200.476 214.1 200.476 214.18H191.336V213.12H199.716L199.156 213.54C199.156 212.78 198.989 212.107 198.656 211.52C198.336 210.92 197.896 210.453 197.336 210.12C196.776 209.787 196.129 209.62 195.396 209.62C194.676 209.62 194.029 209.787 193.456 210.12C192.883 210.453 192.436 210.92 192.116 211.52C191.796 212.12 191.636 212.807 191.636 213.58V213.8C191.636 214.6 191.809 215.307 192.156 215.92C192.516 216.52 193.009 216.993 193.636 217.34C194.276 217.673 195.003 217.84 195.816 217.84C196.456 217.84 197.049 217.727 197.596 217.5C198.156 217.273 198.636 216.927 199.036 216.46L199.836 217.38C199.369 217.94 198.783 218.367 198.076 218.66C197.383 218.953 196.616 219.1 195.776 219.1ZM203.639 219V208.5H205.059V213.14H211.679V208.5H213.099V219H211.679V214.36H205.059V219H203.639ZM217.135 219V208.5H218.555V213.14H225.175V208.5H226.595V219H225.175V214.36H218.555V219H217.135ZM234.951 219.1C233.938 219.1 233.025 218.873 232.211 218.42C231.411 217.953 230.778 217.32 230.311 216.52C229.845 215.707 229.611 214.78 229.611 213.74C229.611 212.687 229.845 211.76 230.311 210.96C230.778 210.16 231.411 209.533 232.211 209.08C233.011 208.627 233.925 208.4 234.951 208.4C235.991 208.4 236.911 208.627 237.711 209.08C238.525 209.533 239.158 210.16 239.611 210.96C240.078 211.76 240.311 212.687 240.311 213.74C240.311 214.78 240.078 215.707 239.611 216.52C239.158 217.32 238.525 217.953 237.711 218.42C236.898 218.873 235.978 219.1 234.951 219.1ZM234.951 217.84C235.711 217.84 236.385 217.673 236.971 217.34C237.558 216.993 238.018 216.513 238.351 215.9C238.698 215.273 238.871 214.553 238.871 213.74C238.871 212.913 238.698 212.193 238.351 211.58C238.018 210.967 237.558 210.493 236.971 210.16C236.385 209.813 235.718 209.64 234.971 209.64C234.225 209.64 233.558 209.813 232.971 210.16C232.385 210.493 231.918 210.967 231.571 211.58C231.225 212.193 231.051 212.913 231.051 213.74C231.051 214.553 231.225 215.273 231.571 215.9C231.918 216.513 232.385 216.993 232.971 217.34C233.558 217.673 234.218 217.84 234.951 217.84ZM97.1291 243.1C96.1157 243.1 95.2024 242.873 94.3891 242.42C93.5891 241.953 92.9557 241.32 92.4891 240.52C92.0224 239.707 91.7891 238.78 91.7891 237.74C91.7891 236.687 92.0224 235.76 92.4891 234.96C92.9557 234.16 93.5891 233.533 94.3891 233.08C95.1891 232.627 96.1024 232.4 97.1291 232.4C98.1691 232.4 99.0891 232.627 99.8891 233.08C100.702 233.533 101.336 234.16 101.789 234.96C102.256 235.76 102.489 236.687 102.489 237.74C102.489 238.78 102.256 239.707 101.789 240.52C101.336 241.32 100.702 241.953 99.8891 242.42C99.0757 242.873 98.1557 243.1 97.1291 243.1ZM97.1291 241.84C97.8891 241.84 98.5624 241.673 99.1491 241.34C99.7357 240.993 100.196 240.513 100.529 239.9C100.876 239.273 101.049 238.553 101.049 237.74C101.049 236.913 100.876 236.193 100.529 235.58C100.196 234.967 99.7357 234.493 99.1491 234.16C98.5624 233.813 97.8957 233.64 97.1491 233.64C96.4024 233.64 95.7357 233.813 95.1491 234.16C94.5624 234.493 94.0957 234.967 93.7491 235.58C93.4024 236.193 93.2291 236.913 93.2291 237.74C93.2291 238.553 93.4024 239.273 93.7491 239.9C94.0957 240.513 94.5624 240.993 95.1491 241.34C95.7357 241.673 96.3957 241.84 97.1291 241.84ZM107.133 243V233.36L107.493 233.74H103.153V232.5H112.533V233.74H108.193L108.553 233.36V243H107.133ZM118.498 243.1C117.458 243.1 116.525 242.873 115.698 242.42C114.885 241.953 114.245 241.32 113.778 240.52C113.311 239.707 113.078 238.78 113.078 237.74C113.078 236.687 113.311 235.76 113.778 234.96C114.245 234.16 114.885 233.533 115.698 233.08C116.525 232.627 117.458 232.4 118.498 232.4C119.391 232.4 120.198 232.573 120.918 232.92C121.638 233.267 122.205 233.787 122.618 234.48L121.558 235.2C121.198 234.667 120.751 234.273 120.218 234.02C119.685 233.767 119.105 233.64 118.478 233.64C117.731 233.64 117.058 233.813 116.458 234.16C115.858 234.493 115.385 234.967 115.038 235.58C114.691 236.193 114.518 236.913 114.518 237.74C114.518 238.567 114.691 239.287 115.038 239.9C115.385 240.513 115.858 240.993 116.458 241.34C117.058 241.673 117.731 241.84 118.478 241.84C119.105 241.84 119.685 241.713 120.218 241.46C120.751 241.207 121.198 240.82 121.558 240.3L122.618 241.02C122.205 241.7 121.638 242.22 120.918 242.58C120.198 242.927 119.391 243.1 118.498 243.1ZM125.391 246.98C124.898 246.98 124.425 246.9 123.971 246.74C123.531 246.58 123.151 246.34 122.831 246.02L123.491 244.96C123.758 245.213 124.045 245.407 124.351 245.54C124.671 245.687 125.025 245.76 125.411 245.76C125.878 245.76 126.278 245.627 126.611 245.36C126.958 245.107 127.285 244.653 127.591 244L128.271 242.46L128.431 242.24L132.751 232.5H134.151L128.891 244.26C128.598 244.94 128.271 245.48 127.911 245.88C127.565 246.28 127.185 246.56 126.771 246.72C126.358 246.893 125.898 246.98 125.391 246.98ZM128.191 243.3L123.351 232.5H124.831L129.111 242.14L128.191 243.3ZM138.364 243V233.36L138.724 233.74H134.384V232.5H143.764V233.74H139.424L139.784 233.36V243H138.364ZM149.729 243.1C148.689 243.1 147.755 242.873 146.929 242.42C146.115 241.953 145.475 241.32 145.009 240.52C144.542 239.707 144.309 238.78 144.309 237.74C144.309 236.687 144.542 235.76 145.009 234.96C145.475 234.16 146.115 233.533 146.929 233.08C147.755 232.627 148.689 232.4 149.729 232.4C150.622 232.4 151.429 232.573 152.149 232.92C152.869 233.267 153.435 233.787 153.849 234.48L152.789 235.2C152.429 234.667 151.982 234.273 151.449 234.02C150.915 233.767 150.335 233.64 149.709 233.64C148.962 233.64 148.289 233.813 147.689 234.16C147.089 234.493 146.615 234.967 146.269 235.58C145.922 236.193 145.749 236.913 145.749 237.74C145.749 238.567 145.922 239.287 146.269 239.9C146.615 240.513 147.089 240.993 147.689 241.34C148.289 241.673 148.962 241.84 149.709 241.84C150.335 241.84 150.915 241.713 151.449 241.46C151.982 241.207 152.429 240.82 152.789 240.3L153.849 241.02C153.435 241.7 152.869 242.22 152.149 242.58C151.429 242.927 150.622 243.1 149.729 243.1ZM158.403 243V233.36L158.763 233.74H154.423V232.5H163.803V233.74H159.463L159.823 233.36V243H158.403ZM165.856 243V232.5H170.496C171.683 232.5 172.616 232.727 173.296 233.18C173.989 233.633 174.336 234.3 174.336 235.18C174.336 236.033 174.009 236.693 173.356 237.16C172.703 237.613 171.843 237.84 170.776 237.84L171.056 237.42C172.309 237.42 173.229 237.653 173.816 238.12C174.403 238.587 174.696 239.26 174.696 240.14C174.696 241.047 174.363 241.753 173.696 242.26C173.043 242.753 172.023 243 170.636 243H165.856ZM167.236 241.88H170.576C171.469 241.88 172.143 241.74 172.596 241.46C173.063 241.167 173.296 240.7 173.296 240.06C173.296 239.42 173.089 238.953 172.676 238.66C172.263 238.367 171.609 238.22 170.716 238.22H167.236V241.88ZM167.236 237.16H170.396C171.209 237.16 171.829 237.007 172.256 236.7C172.696 236.393 172.916 235.947 172.916 235.36C172.916 234.773 172.696 234.333 172.256 234.04C171.829 233.747 171.209 233.6 170.396 233.6H167.236V237.16ZM178.204 246.98C177.711 246.98 177.237 246.9 176.784 246.74C176.344 246.58 175.964 246.34 175.644 246.02L176.304 244.96C176.571 245.213 176.857 245.407 177.164 245.54C177.484 245.687 177.837 245.76 178.224 245.76C178.691 245.76 179.091 245.627 179.424 245.36C179.771 245.107 180.097 244.653 180.404 244L181.084 242.46L181.244 242.24L185.564 232.5H186.964L181.704 244.26C181.411 244.94 181.084 245.48 180.724 245.88C180.377 246.28 179.997 246.56 179.584 246.72C179.171 246.893 178.711 246.98 178.204 246.98ZM181.004 243.3L176.164 232.5H177.644L181.924 242.14L181.004 243.3ZM193.383 243.1C192.29 243.1 191.33 242.873 190.503 242.42C189.677 241.953 189.03 241.32 188.563 240.52C188.097 239.707 187.863 238.78 187.863 237.74C187.863 236.7 188.083 235.78 188.523 234.98C188.977 234.18 189.59 233.553 190.363 233.1C191.15 232.633 192.03 232.4 193.003 232.4C193.99 232.4 194.863 232.627 195.623 233.08C196.397 233.52 197.003 234.147 197.443 234.96C197.883 235.76 198.103 236.687 198.103 237.74C198.103 237.807 198.097 237.88 198.083 237.96C198.083 238.027 198.083 238.1 198.083 238.18H188.943V237.12H197.323L196.763 237.54C196.763 236.78 196.597 236.107 196.263 235.52C195.943 234.92 195.503 234.453 194.943 234.12C194.383 233.787 193.737 233.62 193.003 233.62C192.283 233.62 191.637 233.787 191.063 234.12C190.49 234.453 190.043 234.92 189.723 235.52C189.403 236.12 189.243 236.807 189.243 237.58V237.8C189.243 238.6 189.417 239.307 189.763 239.92C190.123 240.52 190.617 240.993 191.243 241.34C191.883 241.673 192.61 241.84 193.423 241.84C194.063 241.84 194.657 241.727 195.203 241.5C195.763 241.273 196.243 240.927 196.643 240.46L197.443 241.38C196.977 241.94 196.39 242.367 195.683 242.66C194.99 242.953 194.223 243.1 193.383 243.1ZM202.778 243V233.36L203.138 233.74H198.798V232.5H208.178V233.74H203.838L204.198 233.36V243H202.778Z"
                                fill="#676767" />
                        </svg>
                    @endif
                </div>
                <div>
                    <h2 class="fw-bold mt-3 mb-3">{{ $film->title }}</h2>
                    <p class="text-muted mb-2">
                        <b>Возрастное ограничение: </b>{{ $film->age_limit }}
                    </p>
                    <p class="text-muted mb-2"><b>Длительность: </b>{{ date('h:i', strtotime($film->duration)) }}
                    </p>
                    <p class="text-muted mb-2"><b>Жанры: </b>{{ $film->genres }}</p>
                    <p class="text-wrap mb-5" style="width: 400px;"><b>Описание: </b>{{ $film->synopsis }}</p>
                </div>
            </div>
            <div class="d-flex flex-column align-items-center my-5">
                <h4 class="mb-4">Сеансы фильма</h4>
                <table class="table table-hover mb-5">
                    <thead>
                        <tr>
                            <th class="text-center align-middle fw-semibold text-muted">№</th>
                            <th class="text-center align-middle fw-semibold text-muted">Кинозал</th>
                            <th class="text-center align-middle fw-semibold text-muted">Дата</th>
                            <th class="text-center align-middle fw-semibold text-muted">Начало сеанса</th>
                            <th class="text-center align-middle fw-semibold text-muted">Окончание сеанса</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($filmSessions as $filmSession)
                            @if ($filmSession->cinemaHall->latestStatus() == 'activated')
                                <tr>
                                    <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                    <td class="text-center align-middle">{{ $filmSession->cinemaHall->title }}</td>
                                    <td class="text-center align-middle">{{ date('d.m.Y', strtotime($filmSession->date)) }}
                                    </td>
                                    <td class="text-center align-middle">{{ date('H:i', strtotime($filmSession->start)) }}
                                    </td>
                                    <td class="text-center align-middle">{{ date('H:i', strtotime($filmSession->end)) }}
                                    </td>
                                    <td class="text-center align-middle">
                                        <a href="{{ route('user_reservations.create', ['film_session' => $filmSession->id]) }}"
                                            class="btn btn-primary">Забронировать билет</a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
