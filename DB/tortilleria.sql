PGDMP     7    /                {            tortilleria2    15.1    15.1 A    E           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            F           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            G           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            H           1262    106580    tortilleria2    DATABASE        CREATE DATABASE tortilleria2 WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'Spanish_Spain.1252';
    DROP DATABASE tortilleria2;
                postgres    false            �            1259    106620    clientes    TABLE     �   CREATE TABLE public.clientes (
    pk_clientes integer NOT NULL,
    nombre character varying(100) NOT NULL,
    direccion character varying(200) NOT NULL,
    telefono character varying(20)
);
    DROP TABLE public.clientes;
       public         heap    postgres    false            �            1259    106619    clientes_pk_clientes_seq    SEQUENCE     �   CREATE SEQUENCE public.clientes_pk_clientes_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.clientes_pk_clientes_seq;
       public          postgres    false    223            I           0    0    clientes_pk_clientes_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.clientes_pk_clientes_seq OWNED BY public.clientes.pk_clientes;
          public          postgres    false    222            �            1259    106646    detalles_venta    TABLE     �   CREATE TABLE public.detalles_venta (
    pk_detalles_venta integer NOT NULL,
    fk_venta integer NOT NULL,
    fk_productos integer NOT NULL,
    cantidad integer NOT NULL,
    subtotal numeric(10,2) NOT NULL
);
 "   DROP TABLE public.detalles_venta;
       public         heap    postgres    false            �            1259    106645 $   detalles_venta_pk_detalles_venta_seq    SEQUENCE     �   CREATE SEQUENCE public.detalles_venta_pk_detalles_venta_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ;   DROP SEQUENCE public.detalles_venta_pk_detalles_venta_seq;
       public          postgres    false    229            J           0    0 $   detalles_venta_pk_detalles_venta_seq    SEQUENCE OWNED BY     m   ALTER SEQUENCE public.detalles_venta_pk_detalles_venta_seq OWNED BY public.detalles_venta.pk_detalles_venta;
          public          postgres    false    228            �            1259    106589    persona    TABLE     �   CREATE TABLE public.persona (
    pk_persona integer NOT NULL,
    nombres character varying(60) NOT NULL,
    apellidos character varying(60) NOT NULL,
    edad integer NOT NULL,
    sexo character varying(60) NOT NULL
);
    DROP TABLE public.persona;
       public         heap    postgres    false            �            1259    106588    persona_pk_persona_seq    SEQUENCE     �   CREATE SEQUENCE public.persona_pk_persona_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.persona_pk_persona_seq;
       public          postgres    false    217            K           0    0    persona_pk_persona_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public.persona_pk_persona_seq OWNED BY public.persona.pk_persona;
          public          postgres    false    216            �            1259    106627 	   productos    TABLE     �   CREATE TABLE public.productos (
    pk_productos integer NOT NULL,
    nombre character varying(100) NOT NULL,
    precio numeric(8,2) NOT NULL
);
    DROP TABLE public.productos;
       public         heap    postgres    false            �            1259    106626    productos_pk_productos_seq    SEQUENCE     �   CREATE SEQUENCE public.productos_pk_productos_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public.productos_pk_productos_seq;
       public          postgres    false    225            L           0    0    productos_pk_productos_seq    SEQUENCE OWNED BY     Y   ALTER SEQUENCE public.productos_pk_productos_seq OWNED BY public.productos.pk_productos;
          public          postgres    false    224            �            1259    106582 	   proveedor    TABLE     �   CREATE TABLE public.proveedor (
    pk_proveedor integer NOT NULL,
    nombre_proveedor character varying(60) NOT NULL,
    telefono integer NOT NULL,
    direccion character varying(60) NOT NULL,
    ciudad character varying(60) NOT NULL
);
    DROP TABLE public.proveedor;
       public         heap    postgres    false            �            1259    106581    proveedor_pk_proveedor_seq    SEQUENCE     �   CREATE SEQUENCE public.proveedor_pk_proveedor_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public.proveedor_pk_proveedor_seq;
       public          postgres    false    215            M           0    0    proveedor_pk_proveedor_seq    SEQUENCE OWNED BY     Y   ALTER SEQUENCE public.proveedor_pk_proveedor_seq OWNED BY public.proveedor.pk_proveedor;
          public          postgres    false    214            �            1259    106596    tipo_usuario    TABLE     |   CREATE TABLE public.tipo_usuario (
    pk_tipo_usuario integer NOT NULL,
    tipo_usuario character varying(60) NOT NULL
);
     DROP TABLE public.tipo_usuario;
       public         heap    postgres    false            �            1259    106595     tipo_usuario_pk_tipo_usuario_seq    SEQUENCE     �   CREATE SEQUENCE public.tipo_usuario_pk_tipo_usuario_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 7   DROP SEQUENCE public.tipo_usuario_pk_tipo_usuario_seq;
       public          postgres    false    219            N           0    0     tipo_usuario_pk_tipo_usuario_seq    SEQUENCE OWNED BY     e   ALTER SEQUENCE public.tipo_usuario_pk_tipo_usuario_seq OWNED BY public.tipo_usuario.pk_tipo_usuario;
          public          postgres    false    218            �            1259    106603    usuarios    TABLE       CREATE TABLE public.usuarios (
    pk_usuarios integer NOT NULL,
    nombre_usuario character varying(60) NOT NULL,
    correo character varying(60) NOT NULL,
    clave character varying(60) NOT NULL,
    fk_persona integer NOT NULL,
    fk_tipo_usuario integer NOT NULL
);
    DROP TABLE public.usuarios;
       public         heap    postgres    false            �            1259    106602    usuarios_pk_usuarios_seq    SEQUENCE     �   CREATE SEQUENCE public.usuarios_pk_usuarios_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.usuarios_pk_usuarios_seq;
       public          postgres    false    221            O           0    0    usuarios_pk_usuarios_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.usuarios_pk_usuarios_seq OWNED BY public.usuarios.pk_usuarios;
          public          postgres    false    220            �            1259    106634    ventas    TABLE     �   CREATE TABLE public.ventas (
    pk_ventas integer NOT NULL,
    fecha date NOT NULL,
    fk_clientes integer NOT NULL,
    total numeric(10,2) NOT NULL
);
    DROP TABLE public.ventas;
       public         heap    postgres    false            �            1259    106633    ventas_pk_ventas_seq    SEQUENCE     �   CREATE SEQUENCE public.ventas_pk_ventas_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.ventas_pk_ventas_seq;
       public          postgres    false    227            P           0    0    ventas_pk_ventas_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE public.ventas_pk_ventas_seq OWNED BY public.ventas.pk_ventas;
          public          postgres    false    226            �           2604    106623    clientes pk_clientes    DEFAULT     |   ALTER TABLE ONLY public.clientes ALTER COLUMN pk_clientes SET DEFAULT nextval('public.clientes_pk_clientes_seq'::regclass);
 C   ALTER TABLE public.clientes ALTER COLUMN pk_clientes DROP DEFAULT;
       public          postgres    false    222    223    223            �           2604    106649     detalles_venta pk_detalles_venta    DEFAULT     �   ALTER TABLE ONLY public.detalles_venta ALTER COLUMN pk_detalles_venta SET DEFAULT nextval('public.detalles_venta_pk_detalles_venta_seq'::regclass);
 O   ALTER TABLE public.detalles_venta ALTER COLUMN pk_detalles_venta DROP DEFAULT;
       public          postgres    false    229    228    229            �           2604    106592    persona pk_persona    DEFAULT     x   ALTER TABLE ONLY public.persona ALTER COLUMN pk_persona SET DEFAULT nextval('public.persona_pk_persona_seq'::regclass);
 A   ALTER TABLE public.persona ALTER COLUMN pk_persona DROP DEFAULT;
       public          postgres    false    217    216    217            �           2604    106630    productos pk_productos    DEFAULT     �   ALTER TABLE ONLY public.productos ALTER COLUMN pk_productos SET DEFAULT nextval('public.productos_pk_productos_seq'::regclass);
 E   ALTER TABLE public.productos ALTER COLUMN pk_productos DROP DEFAULT;
       public          postgres    false    224    225    225            �           2604    106585    proveedor pk_proveedor    DEFAULT     �   ALTER TABLE ONLY public.proveedor ALTER COLUMN pk_proveedor SET DEFAULT nextval('public.proveedor_pk_proveedor_seq'::regclass);
 E   ALTER TABLE public.proveedor ALTER COLUMN pk_proveedor DROP DEFAULT;
       public          postgres    false    215    214    215            �           2604    106599    tipo_usuario pk_tipo_usuario    DEFAULT     �   ALTER TABLE ONLY public.tipo_usuario ALTER COLUMN pk_tipo_usuario SET DEFAULT nextval('public.tipo_usuario_pk_tipo_usuario_seq'::regclass);
 K   ALTER TABLE public.tipo_usuario ALTER COLUMN pk_tipo_usuario DROP DEFAULT;
       public          postgres    false    218    219    219            �           2604    106606    usuarios pk_usuarios    DEFAULT     |   ALTER TABLE ONLY public.usuarios ALTER COLUMN pk_usuarios SET DEFAULT nextval('public.usuarios_pk_usuarios_seq'::regclass);
 C   ALTER TABLE public.usuarios ALTER COLUMN pk_usuarios DROP DEFAULT;
       public          postgres    false    220    221    221            �           2604    106637    ventas pk_ventas    DEFAULT     t   ALTER TABLE ONLY public.ventas ALTER COLUMN pk_ventas SET DEFAULT nextval('public.ventas_pk_ventas_seq'::regclass);
 ?   ALTER TABLE public.ventas ALTER COLUMN pk_ventas DROP DEFAULT;
       public          postgres    false    226    227    227            <          0    106620    clientes 
   TABLE DATA           L   COPY public.clientes (pk_clientes, nombre, direccion, telefono) FROM stdin;
    public          postgres    false    223   �M       B          0    106646    detalles_venta 
   TABLE DATA           g   COPY public.detalles_venta (pk_detalles_venta, fk_venta, fk_productos, cantidad, subtotal) FROM stdin;
    public          postgres    false    229   �M       6          0    106589    persona 
   TABLE DATA           M   COPY public.persona (pk_persona, nombres, apellidos, edad, sexo) FROM stdin;
    public          postgres    false    217   �M       >          0    106627 	   productos 
   TABLE DATA           A   COPY public.productos (pk_productos, nombre, precio) FROM stdin;
    public          postgres    false    225   N       4          0    106582 	   proveedor 
   TABLE DATA           `   COPY public.proveedor (pk_proveedor, nombre_proveedor, telefono, direccion, ciudad) FROM stdin;
    public          postgres    false    215   %N       8          0    106596    tipo_usuario 
   TABLE DATA           E   COPY public.tipo_usuario (pk_tipo_usuario, tipo_usuario) FROM stdin;
    public          postgres    false    219   BN       :          0    106603    usuarios 
   TABLE DATA           k   COPY public.usuarios (pk_usuarios, nombre_usuario, correo, clave, fk_persona, fk_tipo_usuario) FROM stdin;
    public          postgres    false    221   _N       @          0    106634    ventas 
   TABLE DATA           F   COPY public.ventas (pk_ventas, fecha, fk_clientes, total) FROM stdin;
    public          postgres    false    227   |N       Q           0    0    clientes_pk_clientes_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.clientes_pk_clientes_seq', 1, false);
          public          postgres    false    222            R           0    0 $   detalles_venta_pk_detalles_venta_seq    SEQUENCE SET     S   SELECT pg_catalog.setval('public.detalles_venta_pk_detalles_venta_seq', 1, false);
          public          postgres    false    228            S           0    0    persona_pk_persona_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.persona_pk_persona_seq', 1, false);
          public          postgres    false    216            T           0    0    productos_pk_productos_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public.productos_pk_productos_seq', 1, false);
          public          postgres    false    224            U           0    0    proveedor_pk_proveedor_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public.proveedor_pk_proveedor_seq', 1, false);
          public          postgres    false    214            V           0    0     tipo_usuario_pk_tipo_usuario_seq    SEQUENCE SET     O   SELECT pg_catalog.setval('public.tipo_usuario_pk_tipo_usuario_seq', 1, false);
          public          postgres    false    218            W           0    0    usuarios_pk_usuarios_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.usuarios_pk_usuarios_seq', 1, false);
          public          postgres    false    220            X           0    0    ventas_pk_ventas_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.ventas_pk_ventas_seq', 1, false);
          public          postgres    false    226            �           2606    106625    clientes clientes_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY public.clientes
    ADD CONSTRAINT clientes_pkey PRIMARY KEY (pk_clientes);
 @   ALTER TABLE ONLY public.clientes DROP CONSTRAINT clientes_pkey;
       public            postgres    false    223            �           2606    106651 "   detalles_venta detalles_venta_pkey 
   CONSTRAINT     o   ALTER TABLE ONLY public.detalles_venta
    ADD CONSTRAINT detalles_venta_pkey PRIMARY KEY (pk_detalles_venta);
 L   ALTER TABLE ONLY public.detalles_venta DROP CONSTRAINT detalles_venta_pkey;
       public            postgres    false    229            �           2606    106594    persona persona_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.persona
    ADD CONSTRAINT persona_pkey PRIMARY KEY (pk_persona);
 >   ALTER TABLE ONLY public.persona DROP CONSTRAINT persona_pkey;
       public            postgres    false    217            �           2606    106632    productos productos_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.productos
    ADD CONSTRAINT productos_pkey PRIMARY KEY (pk_productos);
 B   ALTER TABLE ONLY public.productos DROP CONSTRAINT productos_pkey;
       public            postgres    false    225            �           2606    106587    proveedor proveedor_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.proveedor
    ADD CONSTRAINT proveedor_pkey PRIMARY KEY (pk_proveedor);
 B   ALTER TABLE ONLY public.proveedor DROP CONSTRAINT proveedor_pkey;
       public            postgres    false    215            �           2606    106601    tipo_usuario tipo_usuario_pkey 
   CONSTRAINT     i   ALTER TABLE ONLY public.tipo_usuario
    ADD CONSTRAINT tipo_usuario_pkey PRIMARY KEY (pk_tipo_usuario);
 H   ALTER TABLE ONLY public.tipo_usuario DROP CONSTRAINT tipo_usuario_pkey;
       public            postgres    false    219            �           2606    106608    usuarios usuarios_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (pk_usuarios);
 @   ALTER TABLE ONLY public.usuarios DROP CONSTRAINT usuarios_pkey;
       public            postgres    false    221            �           2606    106639    ventas ventas_pkey 
   CONSTRAINT     W   ALTER TABLE ONLY public.ventas
    ADD CONSTRAINT ventas_pkey PRIMARY KEY (pk_ventas);
 <   ALTER TABLE ONLY public.ventas DROP CONSTRAINT ventas_pkey;
       public            postgres    false    227            �           2606    106657 /   detalles_venta detalles_venta_fk_productos_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.detalles_venta
    ADD CONSTRAINT detalles_venta_fk_productos_fkey FOREIGN KEY (fk_productos) REFERENCES public.productos(pk_productos);
 Y   ALTER TABLE ONLY public.detalles_venta DROP CONSTRAINT detalles_venta_fk_productos_fkey;
       public          postgres    false    229    3227    225            �           2606    106652 +   detalles_venta detalles_venta_fk_venta_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.detalles_venta
    ADD CONSTRAINT detalles_venta_fk_venta_fkey FOREIGN KEY (fk_venta) REFERENCES public.ventas(pk_ventas);
 U   ALTER TABLE ONLY public.detalles_venta DROP CONSTRAINT detalles_venta_fk_venta_fkey;
       public          postgres    false    229    227    3229            �           2606    106609 !   usuarios usuarios_fk_persona_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_fk_persona_fkey FOREIGN KEY (fk_persona) REFERENCES public.persona(pk_persona);
 K   ALTER TABLE ONLY public.usuarios DROP CONSTRAINT usuarios_fk_persona_fkey;
       public          postgres    false    217    3219    221            �           2606    106614 &   usuarios usuarios_fk_tipo_usuario_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_fk_tipo_usuario_fkey FOREIGN KEY (fk_tipo_usuario) REFERENCES public.tipo_usuario(pk_tipo_usuario);
 P   ALTER TABLE ONLY public.usuarios DROP CONSTRAINT usuarios_fk_tipo_usuario_fkey;
       public          postgres    false    221    3221    219            �           2606    106640    ventas ventas_fk_clientes_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.ventas
    ADD CONSTRAINT ventas_fk_clientes_fkey FOREIGN KEY (fk_clientes) REFERENCES public.clientes(pk_clientes);
 H   ALTER TABLE ONLY public.ventas DROP CONSTRAINT ventas_fk_clientes_fkey;
       public          postgres    false    227    223    3225            <      x������ � �      B      x������ � �      6      x������ � �      >      x������ � �      4      x������ � �      8      x������ � �      :      x������ � �      @      x������ � �     