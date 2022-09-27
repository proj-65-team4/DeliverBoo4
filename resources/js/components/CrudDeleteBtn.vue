<template>
    <form :action="action + (forceDelete ? '?force-delete' : '')" method="POST" @submit.prevent="onSubmit"
    class="d-inline-block">
    <slot></slot>
        <button type="submit" class="my-button delete-btn m-1">
            <i class="fa-solid fa-trash-can fa-lg"></i>
        </button>
    </form>
</template>

<script>
    export default {
        props: {
            action: String
        },
        data() {
            return {
                forceDelete: false
            }
        },
        methods: {
            onSubmit(e) {
                if(confirm("sei sicuro di volere eliminare questo elemento?")){
                    if(confirm("esegui una cancellazione definitiva?")){
                        this.forceDelete = true
                    }

                    setTimeout(() => {
                        e.target.submit();
                    }, 300)
                }
            }
        }
    }
</script>