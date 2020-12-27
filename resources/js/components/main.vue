<template>
    <div>
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <router-link
                    class="nav-link"
                    :class="[{ active: $route.name === 'home' }]"
                    :to="{ name: 'home' }"
                >
                    Home
                </router-link>
            </li>
            <li class="nav-item">
                <router-link
                    class="nav-link"
                    :class="[{ active: $route.name === 'product' }]"
                    :to="{ name: 'product' }"
                >
                    product
                </router-link>
            </li>
            <li class="nav-item">
                <router-link
                    class="nav-link"
                    :class="[{ active: $route.name === 'new' }]"
                    :to="{ name: 'new' }"
                >
                    User
                </router-link>
            </li>
        </ul>
        <div class="main mt-4">
            <div class="row">
                <div class="col-md-8 offset-2 text-center">
                    <router-view></router-view>
                </div>
            </div>
        </div>
    </div>
</template>