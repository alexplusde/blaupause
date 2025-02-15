<?php

rex_sql_table::get(rex::getTable('blaupause_category'))
    ->ensurePrimaryIdColumn()
    ->ensureColumn(new rex_sql_column('name', 'varchar(191)', false, ''))
    ->ensureColumn(new rex_sql_column('status', 'int(11)'))
    ->ensureColumn(new rex_sql_column('createdate', 'datetime'))
    ->ensureColumn(new rex_sql_column('createuser', 'varchar(191)'))
    ->ensureColumn(new rex_sql_column('updatedate', 'datetime'))
    ->ensureColumn(new rex_sql_column('updateuser', 'varchar(191)'))
    ->ensureColumn(new rex_sql_column('uuid', 'varchar(36)'))
    ->ensureColumn(new rex_sql_column('blaupause_entry_ids', 'int(10) unsigned'))
    ->ensureIndex(new rex_sql_index('uuid', ['uuid'], rex_sql_index::UNIQUE))
    ->ensure();

rex_sql_table::get(rex::getTable('blaupause_entry'))
    ->ensurePrimaryIdColumn()
    ->ensureColumn(new rex_sql_column('name', 'varchar(191)', false, ''))
    ->ensureColumn(new rex_sql_column('status', 'int(11)'))
    ->ensureColumn(new rex_sql_column('createdate', 'datetime'))
    ->ensureColumn(new rex_sql_column('createuser', 'varchar(191)'))
    ->ensureColumn(new rex_sql_column('updatedate', 'datetime'))
    ->ensureColumn(new rex_sql_column('updateuser', 'varchar(191)'))
    ->ensureColumn(new rex_sql_column('uuid', 'varchar(36)'))
    ->ensureColumn(new rex_sql_column('blaupause_category_id', 'int(10) unsigned'))
    ->ensureIndex(new rex_sql_index('uuid', ['uuid'], rex_sql_index::UNIQUE))
    ->ensure();
