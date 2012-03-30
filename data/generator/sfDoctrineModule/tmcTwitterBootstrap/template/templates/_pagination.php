<div class="pagination">
    <ul>
        [?php if($pager->getPage() != $pager->getFirstPage()): ?]
            <li class="prev"><a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=1">[&larr;</a></li>
            <li><a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getPreviousPage() ?]">&larr;</a></li>
        [?php endif ?]

        [?php foreach ($pager->getLinks() as $page): ?]
            [?php if ($page == $pager->getPage()): ?]
                <li class="active"><a href="#">[?php echo $page ?]</a></li>
            [?php else: ?]
                <li><a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $page ?]">[?php echo $page ?]</a></li>
            [?php endif; ?]
        [?php endforeach; ?]

        [?php if($pager->getPage() != $pager->getLastPage()): ?]
            <li><a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getNextPage() ?]">&rarr;</a></li>
            <li class="next"><a href="[?php echo url_for('@<?php echo $this->getUrlForAction('list') ?>') ?]?page=[?php echo $pager->getLastPage() ?]">&rarr;]</a></li>
        [?php endif ?]
    </ul>
</div>