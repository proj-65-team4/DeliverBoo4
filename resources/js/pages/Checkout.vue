<template>
    <div>
        <div class="container py-2">
            <h2>Checkout</h2>

        
            <form action="" method="post">
                <div class="form-floating mb-3">
                    <input type="text" name="customer_name" id="customer_name" class="form-control" placeholder="Inserisci nome">
                    <label for="customer_name">Inserisci nome</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="customer_surname" id="customer_surname" class="form-control" placeholder="Inserisci nome">
                    <label for="customer_surname">Inserisci cognome</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" name="customer_email" id="customer_email" class="form-control" placeholder="Inserisci nome">
                    <label for="customer_email">Inserisci email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="customer_telephone" id="customer_telephone" class="form-control" placeholder="Inserisci nome">
                    <label for="customer_telephone">Inserisci contatto telefonico</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="delivery_address" id="delivery_address" class="form-control" placeholder="Inserisci nome">
                    <label for="delivery_address">Inserisci indirizzo di consegna</label>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    
}
</script>

<style lang="scss">

</style>