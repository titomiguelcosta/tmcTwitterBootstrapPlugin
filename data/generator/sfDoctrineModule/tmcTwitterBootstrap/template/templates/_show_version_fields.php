[?php $exclude_diff = array('version','updated_at'); ?]
<dl>
    [?php foreach ($fields as $name): ?]
    <dt>[?php echo __(sfInflector::humanize($name)) ?]</dt>
    <dd>
        [?php if (!in_array($name, $exclude_diff)): ?]
            [?php echo htmlDiff($original->get($name),$object->get($name)); ?]
        [?php else: ?]
            [?php echo $object->get($name); ?]
        [?php endif; ?]
    </dd>
    [?php endforeach; ?]
</dl>