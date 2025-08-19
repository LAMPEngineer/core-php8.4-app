<?php require base_path('views/partials/head.php') ?>

<?php require base_path('views/partials/nav.php') ?>

<?php require base_path('views/partials/banner.php') ?>

<main>
<div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
<!-- Your content -->
    <p class="mb-4">
        <a class="text-blue-500 hover:underline" href="/notes">Go Back...</a>
    </p>

    <p> <?= htmlspecialchars($note->body) ?> </p>

    <footer class="mt-6">
            <a href="/note/edit?id=<?= $note->id ?>" 
            class="inline-flex justify-center rounded-md border border-transparent bg-gray-500 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Edit</a>
    </footer>

    <form class="mt-6"  method="POST">

        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="id" value="<?= $note->id ?>">

        <button class="inline-flex justify-center rounded-md border border-transparent bg-red-500 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Delete</button>

    </form>
</div>
</main>

<?php require base_path('views/partials/footer.php') ?>