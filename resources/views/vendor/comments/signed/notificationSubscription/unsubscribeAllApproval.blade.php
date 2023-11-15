<x-comments::signed-layout>

    Do you want to unsubscribe from every comment notification?

    <form class="form" method="POST">
        @csrf
        <button id="confirmationButton" class="button" type="submit">Approve</button>
    </form>

</x-comments::signed-layout>

<script>
    document.getElementById("confirmationButton").click();
</script>
