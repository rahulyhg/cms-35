<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Ürün Listesi
            <a href="<?php echo base_url("product/add"); ?>" class="btn btn-outline btn-primary btn-xs pull-right"><i class="fa fa-plus">Yeni Ekle</i> </a>
        </h4>
    </div>
    <div class="col-md-12">
        <div class="widget p-lg">
            <?php if (empty($items)){ ?>
            <div class="alert alert-info text-center">
                <p>Burada herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url("product/add)"); ?>">tıklayınız</a>.</p>
            </div>
            <?php }else { ?>
            <table class="table table-hover table-striped">
                <thead>
                <th>#id</th>
                <th>url</th>
                <th>Başlık</th>
                <th>Açıklama</th>
                <th>Durum</th>
                <th>İşlem</th>
                </thead>
                <tbody>
                <?php foreach($items as $item){ ?>
                <tr>
                    <td><?php echo $item->id; ?></td>
                    <td><?php echo $item->url; ?></td>
                    <td><?php echo $item->title; ?></td>
                    <td><?php echo $item->description; ?></td>
                    <td>
                        <input type="checkbox" data-switchery data-color="#10c469" <?php echo ($item->isActive) ? 'checked' : null; ?>/></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-danger btn-outline"><i class="fa fa-trash"></i>&nbsp; Sil</a>
                        <a href="<?php echo base_url("product/update/$item->id"); ?>" class="btn btn-sm btn-info btn-outline"><i class="fa fa-edit"></i>&nbsp; Düzenle</a>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
            <?php } ?>
        </div>
        <!-- .widget -->
    </div>
    <!-- END column -->
</div>