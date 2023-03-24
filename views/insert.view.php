<div class=" p-3">
    <h4>Insert record</h4>
    <form action="<?= $form_link; ?>" method="post" enctype="multipart/form-data" class=" container-sm mt-5">
        <input type="hidden" name="selected" value="record">
        <input type="hidden" name="item_id" id="item_id" value="<?= $item_id ?>">

        <!-- FORM ITEM PART -->
        <div class="mb-3">
            <div class="input-group" id="dd">
                <span class=" input-group-text">
                    <?php if ($update) : ?>
                        <?= $id; ?>#
                    <?php endif; ?>
                    Item
                </span>
                <input list="suggestionMenu" type="text" name="item_name" id="item_name" class=" form-control" required autocomplete="off" value="<?= $item_name ?>">
                <datalist id="suggestionMenu">
                    <?php foreach ($items as $item) : ?>
                        <option value="<?= displayItem($item) ?>" data-itemId="<?= $item['id'] ?>" class="suggestion">
                            <?= displayItem($item) ?>
                        </option>
                    <?php endforeach; ?>
                </datalist>
                <span class=" input-group-text">Qty:</span>
                <input type="number" name="qty" value="<?= $qty; ?>" class=" form-control">
                <span class=" input-group-text">Date</span>
                <input class="form-control" type="date" name="date" id="date" value="<?= $date ?>">
            </div>
        </div>
        <div class="mb-3">
            <div class=" input-group">
                <span class=" input-group-text">
                    Price
                </span>
                <input class="form-control" type="number" name="item_price" id="item_price" required step="50" value="<?= $item_price ?>">
                <span class=" input-group-text">
                    Category
                </span>
                <select name="item_cat_id" id="item_category" class=" form-select" value="<?= $cat_string ?>">
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?= $category['id']; ?>" <?= ($cat_id == $category['id']) ? "selected" : "" ?>>
                            <?= ucfirst($category['name']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label for="" class=" form-label">
                Note
            </label>
            <textarea class=" form-control" name="note" id=""><?= $note ?></textarea>
        </div>
        <div class=" input-group w-50">
        </div>
        <?php if ($update) : ?>
            <input type="hidden" name="id" value="<?= $id ?>">
            <button class=" btn btn-primary w-100" name="coffee">
                Update
            </button>
        <?php else : ?>
            <button class=" btn btn-dark w-100" name="coffee">
                Submit
            </button>
        <?php endif; ?>
    </form>
</div>
<script src="./js/insert.js">
</script>
<?php

?>