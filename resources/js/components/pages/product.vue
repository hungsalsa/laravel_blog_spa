<template>
    <div>
        <h1>Day la trang san pham</h1>
        <h2>My name's : {{ name }}</h2>
        <h2>Age : {{ age }}</h2>
    </div>
</template>

<script>
export default {
    // props: {},
    data() {
        return {
            name: "Le Van Hung",
            age: 35,
        };
    },
    created() {},
};
</script>