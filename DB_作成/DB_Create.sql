CREATE TABLE menu_m (
menu_id char(10) NOT NULL COMMENT '���j���[ID',
menu_name varchar(255) NOT NULL COMMENT '���j���[��',
menu_img_url varchar(255) NOT NULL COMMENT '���j���[�摜URL',
price int(10) NOT NULL COMMENT '�l�i',
menu_kbn char(1) NOT NULL DEFAULT '0' COMMENT '���j���[�敪',
create_date TIMESTAMP(5) NOT NULL DEFAULT CURRENT_TIMESTAMP(5) COMMENT '�쐬����',
create_op_cd CHAR(10) NOT NULL DEFAULT 'Umknown' COMMENT '�쐬�S���R�[�h',
update_date TIMESTAMP(5) NOT NULL DEFAULT CURRENT_TIMESTAMP(5) COMMENT '�X�V����',
update_op_cd CHAR(10) NOT NULL DEFAULT 'Umknown' COMMENT '�X�V�S���R�[�h',
abolish_date TIMESTAMP(5) NULL DEFAULT NULL COMMENT '�p�~����',
abolish_op_cd CHAR(10) NOT NULL DEFAULT 'Umknown' COMMENT '�p�~�S���R�[�h',
PRIMARY KEY(menu_id))

CREATE TABLE drink (
menu_id          CHAR(10)    NOT NULL COMMENT '���j���[ID',
hot_ice          CHAR(1)     NOT NULL COMMENT '�A�C�X/�z�b�g',
alcol            CHAR(2)     NOT NULL COMMENT '�A���R�[���x��',
drink_kbn        CHAR(1)     NOT NULL COMMENT '�h�����N�敪',
create_date TIMESTAMP(5) NOT NULL DEFAULT CURRENT_TIMESTAMP(5) COMMENT '�쐬����',
create_op_cd CHAR(10) NOT NULL DEFAULT 'Umknown' COMMENT '�쐬�S���R�[�h',
update_date TIMESTAMP(5) NOT NULL DEFAULT CURRENT_TIMESTAMP(5) COMMENT '�X�V����',
update_op_cd CHAR(10) NOT NULL DEFAULT 'Umknown' COMMENT '�X�V�S���R�[�h',
abolish_date TIMESTAMP(5) NULL DEFAULT NULL COMMENT '�p�~����',
abolish_op_cd CHAR(10) NOT NULL DEFAULT 'Umknown' COMMENT '�p�~�S���R�[�h',
PRIMARY KEY(menu_id))

CREATE TABLE food (
menu_id          CHAR(10)    NOT NULL COMMENT '���j���[ID',
spicy            CHAR(2)     NOT NULL COMMENT '�h��',
foo_kbn          CHAR(1)     NOT NULL COMMENT '�t�[�h�敪',
create_date TIMESTAMP(5) NOT NULL DEFAULT CURRENT_TIMESTAMP(5) COMMENT '�쐬����',
create_op_cd CHAR(10) NOT NULL DEFAULT 'Umknown' COMMENT '�쐬�S���R�[�h',
update_date TIMESTAMP(5) NOT NULL DEFAULT CURRENT_TIMESTAMP(5) COMMENT '�X�V����',
update_op_cd CHAR(10) NOT NULL DEFAULT 'Umknown' COMMENT '�X�V�S���R�[�h',
abolish_date TIMESTAMP(5) NULL DEFAULT NULL COMMENT '�p�~����',
abolish_op_cd CHAR(10) NOT NULL DEFAULT 'Umknown' COMMENT '�p�~�S���R�[�h',
PRIMARY KEY(menu_id))

CREATE TABLE user_m (
user_id         CHAR(10)    NOT NULL COMMENT '���[�U�[ID',
user_name       VARCHAR(255) NOT NULL COMMENT '���[�U�[��',
sex             CHAR(1)     NOT NULL COMMENT '����',
age             CHAR(3)     NOT NULL COMMENT '�N��',
user_kbn        CHAR(1)     NOT NULL COMMENT '���[�U�[�敪',
create_date TIMESTAMP(5) NOT NULL DEFAULT CURRENT_TIMESTAMP(5) COMMENT '�쐬����',
create_op_cd CHAR(10) NOT NULL DEFAULT 'Umknown' COMMENT '�쐬�S���R�[�h',
update_date TIMESTAMP(5) NOT NULL DEFAULT CURRENT_TIMESTAMP(5) COMMENT '�X�V����',
update_op_cd CHAR(10) NOT NULL DEFAULT 'Umknown' COMMENT '�X�V�S���R�[�h',
abolish_date TIMESTAMP(5) NULL DEFAULT NULL COMMENT '�p�~����',
abolish_op_cd CHAR(10) NOT NULL DEFAULT 'Umknown' COMMENT '�p�~�S���R�[�h',
PRIMARY KEY(user_id))

CREATE TABLE review (
menu_id          CHAR(10)    NOT NULL COMMENT '���j���[ID',
user_id          CHAR(10)    NOT NULL COMMENT '���[�U�[ID',
review           VARCHAR(255) NULL DEFAULT NULL COMMENT '���r���[��',
evaluation       CHAR(1)     NOT NULL COMMENT '�]��(1�`5)',
create_date TIMESTAMP(5) NOT NULL DEFAULT CURRENT_TIMESTAMP(5) COMMENT '�쐬����',
create_op_cd CHAR(10) NOT NULL DEFAULT 'Umknown' COMMENT '�쐬�S���R�[�h',
update_date TIMESTAMP(5) NOT NULL DEFAULT CURRENT_TIMESTAMP(5) COMMENT '�X�V����',
update_op_cd CHAR(10) NOT NULL DEFAULT 'Umknown' COMMENT '�X�V�S���R�[�h',
abolish_date TIMESTAMP(5) NULL DEFAULT NULL COMMENT '�p�~����',
abolish_op_cd CHAR(10) NOT NULL DEFAULT 'Umknown' COMMENT '�p�~�S���R�[�h',
PRIMARY KEY(user_id, menu_id))