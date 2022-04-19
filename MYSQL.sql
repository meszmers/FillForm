create table person_form
(
    id          int auto_increment
        primary key,
    name        varchar(50)                        not null,
    surname     varchar(50)                        not null,
    person_code varchar(12)                        not null,
    one         text                               null,
    two         varchar(200)                       null,
    three       text                               null,
    four        varchar(255)                       null,
    five        varchar(255)                       null,
    six         varchar(255)                       null,
    seven       varchar(255)                       null,
    eight       varchar(255)                       null,
    nine        varchar(255)                       null,
    ten         varchar(255)                       null,
    eleven      varchar(255)                       null,
    twelve      varchar(255)                       null,
    thirteen    varchar(255)                       null,
    created_at  datetime default CURRENT_TIMESTAMP not null,
    constraint PersonForm_id_uindex
        unique (id)
);

create table person_registry
(
    id          int auto_increment
        primary key,
    person_code varchar(12)                        not null,
    name        varchar(255)                       not null,
    surname     varchar(255)                       not null,
    created_at  datetime default CURRENT_TIMESTAMP not null,
    constraint person_registry_id_uindex
        unique (id),
    constraint person_registry_person_code_uindex
        unique (person_code)
);
