LIBNAME=libdgmail
CFLAGS=-g
DYNAMICLIB=$(LIBNAME).so
STATICLIB=$(LIBNAME).a

all:: $(DYNAMICLIB) $(STATICLIB)

$(DYNAMICLIB): $(LIBNAME).c $(LIBNAME).h
	cc $(CFLAGS) $(HAVE_STRNDUP) -shared -fPIC $(LIBNAME).c -o $@

$(STATICLIB): $(LIBNAME).o
	ar cr $@ $(LIBNAME).o
	ranlib $@

$(LIBNAME).o: $(LIBNAME).c $(LIBNAME).h
	cc $(CFLAGS) $(HAVE_STRNDUP) -c $(LIBNAME).c

test:
	cd ../test; make test

clean:
	rm -f $(DYNAMICLIB) $(STATICLIB) $(LIBNAME).o
