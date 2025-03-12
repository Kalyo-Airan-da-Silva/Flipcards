CREATE TABLE public.tbmateria (
                matcodigo BIGINT NOT NULL,
                matdescricao VARCHAR(100) NOT NULL,
                matativo SMALLINT NOT NULL,
                CONSTRAINT pk_tbmateria PRIMARY KEY (matcodigo)
);


CREATE TABLE public.tbpergunta (
                percodigo BIGINT NOT NULL,
                perpergunta TEXT NOT NULL,
                perresposta TEXT NOT NULL,
                matcodigo BIGINT NOT NULL,
                CONSTRAINT pk_tbpergunta PRIMARY KEY (percodigo)
);


ALTER TABLE public.tbpergunta ADD CONSTRAINT tbmateria_tbpergunta_fk
FOREIGN KEY (matcodigo)
REFERENCES public.tbmateria (matcodigo)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;