<template>
    <li>
        <a :href="'#'">
            {{ category.title }}
            <span class="badge badge-primary">{{ category.number }}</span>
        </a>
    </li>
</template>

<script>
export default {
    name: "CategoryList",
    props: {
        category: {
            required: true,
            type: Object
        }
    }
}
</script>
