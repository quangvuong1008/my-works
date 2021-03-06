<?php

use App\Helpers\Html;
use App\Helpers\StringHelper;
use App\Helpers\Widgets\BreadcrumbsWidget;

/**
 * @var \App\Libraries\BaseView $this
 * @var \App\Models\ProductCategoryModel $category
 * @var \App\Models\ProductModel $model
 * @var \App\Models\ProductModel[] $products
 */
$this->title = Html::decode($model->title);
?>
<div class="main-wrap">
    <div class="container">
        <div class="row hidden-xs">
            <div class="col-md-12">
                <?= BreadcrumbsWidget::register($this, [
                    'links' => [
                        ['label' => $category->title, 'url' => $category->getUrl()],
                        $model->title,
                    ]
                ]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div>
                    <article>
                        <section class="row">
                            <figure class=col-md-6>
                                <?php if (($gallery = $model->getGallery()) !== null && !empty($gallery)): ?>
                                    <div class="scrollable gallery-wrap">
                                        <ul class="singer-carousel no-js">
                                            <?php foreach ($gallery as $image): ?>
                                                <li data-thumb="<?= $image->getImage() ?>"
                                                    data-src="<?= $image->getImage() ?>">
                                                    <div class="img-wrap">
                                                        <?= Html::img($image->getImage(), [
                                                            'alt' => $image->title ?: $model->title,
                                                        ]) ?>
                                                    </div>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                            </figure>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h1 class="product-page-title" itemprop="name">
                                            <b><?= Html::decode($model->title) ?></b>
                                        </h1>
                                    </div>
                                </div>
                                <h4 class="product-price">
                                    <div class="price"><?= $model->price ? StringHelper::formatPrice(
                                            $model->price, 'VN??') : 'Li??n h???' ?></div>
                                </h4>
                                <p itemprop="description"></p>
                                <p>Ch???t li???u: <?= $model->material ?: '??ang c???p nh???t' ?></p>
                                <p>B???o h??nh: <?= $model->guarantee ?: '??ang c???p nh???t' ?></p>
                                <?php if (!empty($model->short_intro)): ?>
                                    <p><strong>Th??ng tin th??m...</strong></p>
                                    <p><?= Html::decode(nl2br($model->short_intro)) ?></p>
                                <?php endif ?>
                                <a href="<?= base_url('shopping-cart/add') ?>"
                                   class="btn btn-danger btn-custom-red add-to-cart-btn"
                                   data-id="<?= $model->getPrimaryKey() ?>">
                                    <i class="glyphicon glyphicon-shopping-cart"></i> Mua ngay
                                </a>
                                <a href="#content" class="btn btn-primary btn-custom-primary">Xem m?? t???</a>
                                <br><br>
                                <p>
                                    <em>Gi?? s???n ph???m t??y v??o th???i ??i???m v?? ch???t li???u s???n ph???m. Vui l??ng g???i</em>
                                    <strong><span style="color:#ff0000">______</span> </strong>
                                    <em>????? bi???t gi?? ch??nh x??c nh???t</em>
                                </p>
                                <br>
                            </div>
                        </section>
                        <section class="row">
                            <div class="col-md-12">
                                <div>
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active">
                                            <a href="#mota" aria-controls="mota" role="tab"
                                               data-toggle="tab">M?? t??? s???n ph???m</a>
                                        </li>
                                        <li role="presentation">
                                            <a href="#danhgia" aria-controls="danhgia" role="tab"
                                               data-toggle="tab">????nh gi??</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="mota">
                                            <article id="intro"><?= Html::decode($model->intro) ?></article>
                                            <article id="content"><?= Html::decode($model->content) ?></article>
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="danhgia">##</div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </article>
                </div>
                <?php if ($products && !empty($products)): ?>
                    <section>
                        <div class="row">
                            <div class="col-md-12 text-center"><h2 class="title-box2nd"><b>S???N PH???M LI??N QUAN</b></h2>
                            </div>
                        </div>
                        <div class="row">
                            <?php foreach ($products as $product): ?>
                                <div class="col-md-3">
                                    <div class="product-block text-center">
                                        <a href="<?= $product->getUrl() ?>"
                                           title="<?= Html::decode($product->title) ?>">
                                            <span class="img-wrap">
                                                <?= Html::img($product->getImage(), ['alt' => $product->title]) ?>
                                            </span>
                                            <h3><?= Html::decode($product->title) ?></h3>
                                            <h4 class="product-price">
                                                <div class="price"><?= $product->price ? StringHelper::formatPrice(
                                                        $product->price, 'VN??') : 'Li??n h???' ?></div>
                                            </h4>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </section>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>